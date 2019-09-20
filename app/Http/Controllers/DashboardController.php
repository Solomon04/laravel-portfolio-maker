<?php

namespace App\Http\Controllers;

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

    public function add(Request $request)
    {
        $skills = explode(',', $request->skills);
        $project = new Project();
        $project->user_id = Auth::user()->id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = $request->image_url;
        $project->skills = $skills;
        $project->call_to_action = ['url' => $request->button_url, 'name' => $request->button_description];
        $project->save();

        return back()->with('success', sprintf('%s has been added.', $request->title));
    }

    public function social(Request $request)
    {

    }
}
