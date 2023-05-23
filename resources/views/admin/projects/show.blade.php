@extends('layouts/admin')

@section('content')

<div class="container py-5">

    <h1>{{$project->title}}</h1>
    <h4 class="text-secondary fst-italic">{{$project->type->name ?? ''}}</h4>
    <hr>

    <div id="info" class="d-flex flex-column gap-3">

        <span><strong>Execution Date: </strong>{{date("d/m/Y", strtotime($project->execution_date))}}</span>
        <span class="d-flex gap-2"><strong>Languages: </strong>

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
        </span>
        <span class="d-flex gap-2"><strong>Frameworks: </strong>

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
        
        </span>

    </div>

    <hr>
    <h4>Description</h4>
    <p>{{$project->description}}</p>


    <div id="buttons" class="d-flex flex-column gap-3">

        
        <div id="project-edit">
            <a href="{{route('admin.projects.edit', $project->slug )}}" ><button class="btn btn-primary">Edit Project</button></a>
        </div>

        <div id="project-delete">

            
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete Project</button>
            
            
            <!-- Modal -->
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to permanently delete the project?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Permanently</button>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
        
    </div>
    
</div>
@endsection