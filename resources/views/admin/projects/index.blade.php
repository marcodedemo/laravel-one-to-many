@extends('layouts/admin')


@section('content')


<div class="jumbotron p-3 mb-4 bg-light rounded-3">
    <div class="container py-5">

        <h1 class="display-5 fw-bold">
            Lista Progetti 
        </h1>
    </div>
</div>

<div class="container d-flex flex-wrap gap-3 mt-5">

    @foreach ($projects as $project)

    
    
        <div class="card" style="width: 18rem;">
            <div class="card-body d-flex flex-column justify-content-between">

                <a href="{{route('admin.projects.show', $project->slug)}}" class="text-black"><h5 class="card-title">{{$project->title}}</h5>
                </a>
            
                <div class="card-text">
                    <ul>
                        <li>
                            <strong>Languages: </strong>

                            <div class="logo-container d-flex gap-2">

                                
                                @if (str_contains(strtolower($project['language']), "html"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/html.png')}}" alt="html5 logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['language']), "css"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/css.png')}}" alt="css3 logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['language']), "js"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/js.png')}}" alt="js logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['language']), "php"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/php.png')}}" alt="php logo"></div>
                                @endif

                                
                                
                                
                            </div>
                        </li>

                        <li><strong>Frameworks: </strong>

                            <div class="logo-container d-flex gap-2">

                                @if (str_contains(strtolower($project['framework']), "vue"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/vue.png')}}" alt="Vuejs logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['framework']), "vite"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/vite.png')}}" alt="Vite logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['framework']), "bootstrap"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/bootstrap.png')}}" alt="bootstrap logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['framework']), "mysql"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/sql.png')}}" alt="MySQL logo"></div>
                                @endif

                                @if (str_contains(strtolower($project['framework']), "laravel"))
                                <div class="logo"><img src="{{Vite::asset('resources/img/logos/laravel.png')}}" alt="Laravel logo"></div>
                                @endif

                            </div>
                        
                        </li>

                        <li><strong>Execution Date: </strong> {{date("d/m/Y", strtotime($project['execution_date']))}}</li>
                        <li><strong>Description: </strong> {{$project['description']}}</li>
                        
                    </ul>
                </div>
                <a href="{{$project->link}}" class="card-link">Github</a>
            </div>
        </div>


        
    @endforeach

</div>


<div class="container d-flex justify-content-center align-items-center my-5">
    <div id="buttons">
        <a href="{{route('admin.projects.create')}}"><button class="btn btn-primary">Add Project</button></a>
    </div>
</div>


@endsection