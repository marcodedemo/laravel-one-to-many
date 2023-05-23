@extends('layouts/admin')


@section('content')

<div class="container py-5">

    <h1>{{$type->name}}</h1>
    <hr>
    <span><strong>Types: </strong>{{count($type->projects)}}</span>
    <hr>
    <span>{{$type->description}}</span>



    <div id="buttons" class="d-flex flex-column gap-3">

        
        <div id="type-edit">
            <a href="{{route('admin.types.edit', $type->slug )}}" ><button class="btn btn-primary">Edit Type</button></a>
        </div>

        <div id="type-delete">

            
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete Type</button>
            
            
            <!-- Modal -->
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to permanently delete the type?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
                                
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



@endsection