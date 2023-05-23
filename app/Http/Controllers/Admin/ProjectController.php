<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();

        return view('admin/projects/create', compact('types'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $formData = $request->all();

        $existingProject = Project::where('title', $formData['title'])->first();

        if ($existingProject) {
            return redirect()->back()->withErrors(['title' => 'A project with the same title already exists.'])->withInput();
        }

        $formData['slug'] = Str::slug($formData['title'], '-');

        $newProject = new Project();

        $newProject->fill($formData);

        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
        return view('admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        $types = Type::all();

        return view('admin/projects/edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request, $project->id);

        $formData = $request->all();

        $project->update($formData);

        $project->save();

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    private function validation($request, $projectId = null){
        
        $formData = $request->all();
    
        $validator = Validator::make($formData, [
            
            'title' => 'required|unique:projects,title,'. $projectId,
            'description' => 'required',
            'link' => 'required',
            'language' => 'required|max:50',
            'framework' => 'required|max:50',
            'execution_date' => 'required',
            'type_id' => 'nullable|exists:types,id'
        ], [
            'title.required' => 'Insert a title',
            'title.unique' => 'Title already taken, please insert an alternative value',
            'description.required' => 'Insert a description',
            'language.required' => 'Insert a language',
            'language.required' => 'The language field can have a maximum of 50 characters',
            'framework.required' => 'Insert a framework',
            'framework.max' => 'The framework field can have a maximum of 50 characters',
            'execution_date.required' => 'Insert an execution date',
            'type_id.exists' => 'Insert an existing category value',

        ])->validate();
    
        return $validator;
    }
}
