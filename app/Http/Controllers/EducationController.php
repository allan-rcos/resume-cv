<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Education;
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

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EducationResource::collection(Auth::user()->education()->with('highlights')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->getPayload()->all();
        $errors = [];
        foreach ($data as $employment) {
            $validated = Validator::make($employment, [
                'name' => ['required', new AlphaNumericSpaced()],
                'school' => ['required', new AlphaNumericSpaced()],
                'photo' => ['nullable', 'url'],
                'address' => ['required', 'string'],
                'start' => ['required', 'date'],
                'end' => ['nullable', 'date'],
                'highlights.*' => ['nullable', 'string']
            ]);
            if ($validated->fails())
                $errors[] = $validated->errors();
        }
        if ($errors)
            return new JsonResponse(['errors' => $errors], 400); // BadRequest
        if (!$data)
            return new JsonResponse(['errors' => ['message' => 'Empty data']], 404); // NotFound

        try {
            DB::transaction(function() use ($data) {
                /** @var User $user */
                $user = Auth::user();
                $education = $user->education();
                $education->delete();
                foreach ($data as $item) {
                    $highlights = [];
                    if (isset($item['highlights'])) {
                        $highlights = $item['highlights'];
                        unset($item['highlights']);
                    }
                    $item['user_id'] = $user->id;
                    $new_education = Education::create($item);
                    foreach ($highlights as $highlight) {
                        $new_education->highlights()->save(Highlight::create(['description' => $highlight]));
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
    public function show(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        //
    }
}
