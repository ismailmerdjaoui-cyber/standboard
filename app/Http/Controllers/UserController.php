<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserService $service
    ) {}

    public function index(Request $request)
    {
        $users = $this->service->query([
            'search' => $request->input('search'),
            'search_columns' => ['name', 'email'],
            'order_by' => [['created_at', 'desc']],
        ])->paginate($request->input('per_page', 15));

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(int $id)
    {
        $user = $this->service->find($id);

        if (!$user) {
            abort(404);
        }

        return view('users.show', compact('user'));
    }

    public function edit(int $id)
    {
        $user = $this->service->find($id);

        if (!$user) {
            abort(404);
        }

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
