@extends('layouts/admin')


@section('content')

<div class="container my-5">

  
  <form action="{{route('admin.projects.store')}}" method="POST">
    @csrf
    
    <div class="mb-3">
      <label for="title">Title</label>
      <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
      
      @error('title')
      <div class="invalid-feedback">
        {{$message}}
      </div> 
      @enderror
      
    </div>

    <div class="mb-3">
      <label for="type_id">Project Type</label>
      <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">

        <option value="">None</option>

        @foreach ($types as $type)
            <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
        @endforeach

      </select>
      @error('type_id')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="description">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
      
      @error('description')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
      
    </div>
    
    <div class="mb-3">
      <label for="link">Github Link</label>
      <input class="form-control @error('link') is-invalid @enderror" type="text" id="link" name="link" value="{{old('link')}}">
      
      @error('link')
      <div class="invalid-feedback">
        {{$message}}
      </div> 
      @enderror
      
    </div>
    
    <div class="mb-3">
      <label for="language">Languages</label>
      <input class="form-control @error('language') is-invalid @enderror" type="text" id="language" name="language" value="{{old('language')}}">
      
      @error('language')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
      
    </div>
    
    <div class="mb-3">
      <label for="framework">Frameworks</label>
      <input class="form-control @error('framework') is-invalid @enderror" type="text" id="framework" name="framework" value="{{old('framework')}}">
      
      @error('framework')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
      
    </div>
    
    <div class="mb-3">
      <label for="execution_date">Execution Date</label>
      <input class="form-control @error('execution_date') is-invalid @enderror" type="text" id="execution_date" name="execution_date" value="{{old('execution_date')}}">
      
      @error('execution_date')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
      
    </div>
    
    <button class="btn btn-primary" type="submit">Aggiungi</button>
  </form>
  
  
</div>
  
  @endsection