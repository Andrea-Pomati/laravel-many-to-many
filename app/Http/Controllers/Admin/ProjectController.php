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
        
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        $this->validation($formData);

        $project = new Project();

        $project->fill($formData);

        $project->slug = Str::slug($project->title, '-');

        $project->save();

        return redirect()->route('admin.projects.show', $project);
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

        return view('admin.projects.edit', compact('project', 'types'));
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
        $formData = $request->all();

        $this->validation($formData);

        //$project->slug = Str::slug($formData['title'], '-' );
        $formData['slug'] = Str::slug($formData['title'], '-' );

        $project->update($formData);

        return redirect()->route('admin.projects.show', $project);
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


    //validazione
    private function validation($formData) {
        $validator = Validator::make($formData, [
            'title' => 'required|max:200|min:3',
            'content' => 'required',
            'type_id' => 'nullable|exists:types,id',
        ], [
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.required' => 'Devi inserire un titolo',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',
            'content.required' => 'Il post deve avere un contenuto',
            'type_id.exists' => 'Il tipo deve essere presente nel nostro sito'
        ])->validate();
    }
}
