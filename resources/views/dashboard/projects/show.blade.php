@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects:</h1>
        <a href="#" class="btn btn-success btn-block">Add Project</a>
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