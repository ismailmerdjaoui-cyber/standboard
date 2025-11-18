<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Simple base CRUD service that all domain-specific services can extend.
 *
 * Inline usage example (don't create these files here):
 * ```
 * class PostService extends BaseCrudService
 * {
 *     public function __construct(Post $post)
 *     {
 *         parent::__construct($post);
 *     }
 * }
 * 
 * class PostController extends Controller
 * {
 *     public function __construct(private PostService $service)
 *     {
 *     }
 *
 *     public function index(Request $request)
 *     {
 *         $rows = $this->service->query([
 *             'search' => $request->input('search'),
 *             'search_columns' => ['title', 'body'],
 *             'order_by' => [['created_at', 'desc']],
 *         ])->paginate($request->input('per_page', 15));
 *
 *         return view('posts.index', compact('rows'));
 *     }
 * }
 * ```
 */
class BaseCrudService
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function newQuery(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Load a collection with optional relations.
     *
     * @param  array  $with
     * @param  array  $columns
     */
    public function all(array $with = [], array $columns = ['*']): Collection
    {
        return $this->newQuery()->with($with)->get($columns);
    }

    public function find(int $id, array $with = [], array $columns = ['*']): ?Model
    {
        return $this->newQuery()->with($with)->find($id, $columns);
    }

    public function create(array $attributes): Model
    {
        return $this->newQuery()->create($attributes);
    }

    public function update(int $id, array $attributes): Model
    {
        $model = $this->newQuery()->findOrFail($id);

        $model->fill($attributes);
        $model->save();

        return $model;
    }

    public function delete(int $id): bool
    {
        return $this->newQuery()->findOrFail($id)->delete();
    }

    public function restore(int $id): bool
    {
        $model = $this->newQuery()->withTrashed()->findOrFail($id);

        return $model->restore();
    }

    public function forceDelete(int $id): bool
    {
        $model = $this->newQuery()->withTrashed()->findOrFail($id);

        return $model->forceDelete();
    }

    /**
     * Build a query for DataTables / pagination.
     *
     * @param  array  $options
     */
    public function query(array $options = []): Builder
    {
        $query = $this->newQuery();

        if (! empty($with = $options['with'] ?? [])) {
            $query->with($with);
        }

        if (! empty($filters = $options['filters'] ?? [])) {
            foreach ($filters as $column => $value) {
                if (is_array($value) && isset($value[0], $value[1])) {
                    $query->where($column, $value[0], $value[1]);
                } else {
                    $query->where($column, $value);
                }
            }
        }

        if (! empty($search = $options['search'] ?? null)) {
            $columns = $options['search_columns'] ?? [];

            $this->applySearch($query, $search, $columns);
        }

        if (! empty($orderBy = $options['order_by'] ?? [])) {
            foreach ($orderBy as $order) {
                if (is_array($order) && isset($order[0])) {
                    $query->orderBy($order[0], $order[1] ?? 'asc');
                }
            }
        }

        return $query;
    }

    /**
     * Apply a search term across multiple columns.
     */
    public function applySearch(Builder $query, string $term, array $columns = []): Builder
    {
        if ($term === '' || empty($columns)) {
            return $query;
        }

        $term = mb_strtolower($term);

        return $query->where(function (Builder $builder) use ($columns, $term): void {
            foreach ($columns as $column) {
                $builder->orWhereRaw("LOWER({$column}) LIKE ?", ["%{$term}%"]);
            }
        });
    }
}
