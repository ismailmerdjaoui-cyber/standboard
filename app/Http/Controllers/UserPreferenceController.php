<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPreferenceRequest;
use App\Services\UserPreferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserPreferenceController extends Controller
{
    public function __construct(
        private UserPreferenceService $service
    ) {}

    public function index(Request $request): JsonResponse
    {
        $preferences = $this->service->query([
            'filters' => $request->only(['user_id']),
            'order_by' => [['created_at', 'desc']],
        ])->paginate($request->input('per_page', 15));

        return response()->json($preferences);
    }

    public function show(int $id): JsonResponse
    {
        $preference = $this->service->find($id);

        if (!$preference) {
            return response()->json(['message' => 'User preference not found'], 404);
        }

        return response()->json($preference);
    }

    public function store(UserPreferenceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id(); // Ensure it's for current user

        $preference = $this->service->create($data);

        return redirect()->back()->with('success', 'Preference added successfully.');
    }

    public function update(UserPreferenceRequest $request, int $id): JsonResponse
    {
        $preference = $this->service->update($id, $request->validated());

        return response()->json($preference);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);

        return response()->json(['message' => 'User preference deleted']);
    }
}
