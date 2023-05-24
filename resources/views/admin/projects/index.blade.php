@extends('layouts/admin')

@section('content')
<h1 class="text-center">Tutti i progetti</h1>
<table class="mt-5 table table-striped mb-4">
    <thead>
        <th>
            Titolo
        </th>
        <th>
            Contenuto
        </th>
        <th>
            Slug
        </th>
        <th>
            Tipo
        </th>
        <th>
            Comandi
        </th>
    </thead>

    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->content}}</td>
            <td>{{$project->slug}}</td>
            <td>{{$project->type?->name}}</td>
            <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>    

<div class="d-flex justify-content-around">
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary">
        Aggiungi un progetto
    </a>
</div>

@endsection