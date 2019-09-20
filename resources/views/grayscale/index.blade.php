@extends('layouts.grayscale')

@section('content')
<!-- Header -->
<header class="masthead" id="page-top">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <img src="http://www.solomon04.xyz/my-portfolio/img/profile.jpg" class="rounded-circle">
            <h1 class="mx-auto my-1 text-uppercase">{{$user->name}}</h1>
            <h2 class="text-white-50 mx-auto mt-3 mb-5">{{$user->title}}</h2>
            <a href="#projects" class="btn btn-primary js-scroll-trigger">View Projects</a>
        </div>
    </div>
</header>


<!-- Projects Section -->
<section id="projects" class="projects-section bg-light">
    <div class="container">

        <!-- Project One Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            @foreach($user->projects as $project)
                <div class="col-lg-6">
                    @if(!is_null($project->image))
                        <img class="img-fluid h-100" height="100%" src="{{$project->image}}" alt="">
                    @else
                        <img class="img-fluid h-100" height="100%" src="{{asset('img/demo-image-01.jpg')}}" alt="">
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h3 class="text-white">{{$project->title}}</h3>
                                <p class="mb-0 text-white-50">{{$project->description}}</p>
                                <hr class="d-none d-lg-block mb-0 ml-0">
                                <ul class="nav nav-pills nav-fill mt-3">
                                    @foreach($project->skills as $skill)
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">{{$skill}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="btn btn-primary btn-block text-white" href="{{$project->call_to_action['url']}}" >{{$project->call_to_action['name']}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section bg-black" id="contact">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="text-white mb-5">Contact Me </h2>
            </div>

            <div class="col-md-12 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">
                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="social d-flex justify-content-center">
            @if(!is_null($user->linkedin))
                <a href="{{$user->linkedin}}" class="mx-2">
                    <i class="fab fa-linkedin"></i>
                </a>
            @endif
            @if(!is_null($user->github))
                <a href="{{$user->github}}" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            @endif
            @if(!is_null($user->stack_overflow))
                <a href="{{$user->stack_overflow}}" class="mx-2">
                    <i class="fab fa-stack-overflow"></i>
                </a>
            @endif
            @if(!is_null($user->youtube))
                <a href="{{$user->youtube}}" class="mx-2">
                    <i class="fab fa-youtube"></i>
                </a>
            @endif
            @if(!is_null($user->resume))
                <a href="{{$user->resume}}" class="mx-2">
                    <i class="fa fa-file"></i>
                </a>
            @endif
        </div>

    </div>
</section>
@endsection