@extends('layouts/admin')


@section('content')


<div class="container py-5">
    
    <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($types as $type)

          <tr>

            <td scope="row">{{$type->name}}</td>
            <td>{{$type->description}}</td>
            <td>{{$type->slug}}</td>

            <td>
              <a href="{{route('admin.types.show', $type->slug)}}" class="text-danger"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>

          </tr>
              
          @endforeach
        </tbody>

    </table>


    <div class="container d-flex justify-content-center align-items-center my-5">
        <div id="buttons">
            <a href="{{route('admin.types.create')}}"><button class="btn btn-primary">Add Type</button></a>
        </div>
    </div>



</div>

@endsection