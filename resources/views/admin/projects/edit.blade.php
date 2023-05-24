@extends('layouts.admin')

@section('content')


<div class="container">
    <h1 class="mb-3">Modifica il progetto</h1>
    <form action="{{route('admin.projects.update', $project)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $project->title }}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id">Tipo</label>
            <select name="type_id" id="Type_id" class="form-select @error('type_id') is-invalid @enderror">
                
                <option value="">Nessuna</option>

                @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
                @endforeach

            </select>
            
                @error('type_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="content">Contenuto del progetto</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{old('content') ?? $project->content}}</textarea>
            @error('content')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Modifica</button>
    </form>
    
</div>

@endsection