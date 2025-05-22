<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Highlight;
use App\Models\Project;
use App\Rules\AlphaNumericSpaced;
use Illuminate\Database\DeadlockException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectResource::collection(Auth::user()->projects()->with('highlights')->get());
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
                'photo' => ['nullable', 'url'],
                'url' => ['nullable', 'url'],
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
                $user = Auth::user();
                $projects = $user->projects();
                $projects->delete();
                foreach ($data as $item) {
                    $highlights = [];
                    if (isset($item['highlights'])) {
                        $highlights = $item['highlights'];
                        unset($item['highlights']);
                    }
                    $item['user_id'] = $user->id;
                    $new_project = Project::create($item);
                    foreach ($highlights as $highlight) {
                        $new_project->highlights()->save(Highlight::create(['description' => $highlight]));
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
    public function show(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
