@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects:</h1>
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addProject">
            Add Project
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="addProject" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('new.project')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="image_url">Image URL</label>
                                <input type="text" class="form-control" name="image_url" id="image_url" aria-describedby="image url" placeholder="Enter image url" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Enter title of project" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="skills">Skills</label>
                                <input type="text" class="form-control " name="skills" id="skills" aria-describedby="skills" placeholder="Skill1,Skill2,Skill3" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="button_description">Button Description</label>
                                <input type="text" class="form-control" name="button_description" id="button_description" aria-describedby="Button Description" placeholder="Enter button description" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="button_url">Button URL</label>
                                <input type="text" class="form-control" name="button_url" id="button_url" aria-describedby="Button URL" placeholder="Enter button URL" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row card-deck">
            @foreach($projects as $project)
                <div class="col-lg-6 col-xs-12 my-3">
                    <div class="card h-100 w-100" style="width: 18rem;">
                        <div class="card-header text-right">
                            <button class="btn btn-link btn-block">Click To Edit {{$project->title}}</button>
                        </div>
                        @if(is_null($project->image))
                            <img class="card-img-top" src="{{asset('img/demo-image-01.jpg')}}">
                        @else
                            <img class="card-img-top" src="{{$project->image}}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$project->title}}</h5>
                            <p class="card-text">{{$project->description}}</p>

                        </div>
                        <div class="card-footer">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @foreach($project->skills as $skill)
                                        <li class="breadcrumb-item"><a href="#">{{$skill}}</a></li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                        <div class="card-footer">
                            <a href="{{$project->call_to_action['url']}}" class="btn btn-primary btn-block">{{$project->call_to_action['name']}}</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        {{ $projects->links() }}
    </div>
@endsection