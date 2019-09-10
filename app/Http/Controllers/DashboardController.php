<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $projects = $user->projects()->paginate(6);
        return view('dashboard.projects.show')->with('projects', $projects);
    }

    public function create(CreateProject $request)
    {
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = $request->image;
        $project->skill = $request->skills;
        $project->call_to_action = ['url' => $request->coa_url, 'name' => $request->coa_name];
        $project->save();
    }
}
