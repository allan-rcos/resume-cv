<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmploymentResouce;
use App\Models\Employment;
use App\Models\Highlight;
use App\Models\User;
use App\Rules\AlphaNumericSpaced;
use Illuminate\Database\DeadlockException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmploymentResouce::collection(Auth::user()->employments()->with('highlights')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response|JsonResponse
    {
        $data = $request->getPayload()->all();
        $errors = [];
        for ($i = 0; $i < count($data); $i++) {
            $validated = Validator::make($data[$i], [
                'name' => ['required', new AlphaNumericSpaced()],
                'photo' => ['nullable', 'url'],
                'address' => ['required', 'string'],
                'start' => ['required', 'date'],
                'end' => ['nullable', 'date'],
                'highlights.*' => ['nullable', 'string']
            ]);
            if ($validated->fails())
                $errors[$i] = $validated->errors();
        }
        if ($errors)
            return new JsonResponse(['errors' => $errors], 400); // BadRequest
        if (!$data)
            return new JsonResponse(['errors' => ['message' => 'Empty data']], 404); // NotFound

        try {
            DB::transaction(function() use ($data) {
                /** @var User $user */
                $user = Auth::user();
                $employments = $user->employments();
                $employments->delete();
                foreach ($data as $item) {
                    $highlights = [];
                    if (isset($item['highlights'])) {
                        $highlights = $item['highlights'];
                        unset($item['highlights']);
                    }
                    $item['user_id'] = $user->id;
                    $new_employment = Employment::create($item);
                    foreach ($highlights as $highlight) {
                        $new_employment->highlights()->save(Highlight::create(['description' => $highlight]));
                    }
                }
            });
            return new Response(status: 201); // Success
        } catch (DeadlockException $e) {
            return new JsonResponse(['errors' => ['message' => $e->getMessage()]], 500); // Server Error
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employment $employment)
    {
        //
        return $employment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employment $employment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employment $employment)
    {
        //
    }
}
