@extends('layouts.admin')

@section('content')

    <div class>
        <h1>Tipi</h1>

        <table class="table table-striped">
            <thead>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Slug</th>
                <th>N° progetti</th>
                <th>Comandi</th>
            </thead>

            <tbody>

                @foreach($types as $type)
                <tr>
                    <td>{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td>{{$type->slug}}</td>
                    <td>{{ count($type->projects) }}</td>
                    <td><a href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                </tr>
                @endforeach
            </tbody>


        </table>
        <div class="d-flex justify-content-center py-3">
            <a href="{{route('admin.types.create')}}" class="btn btn-primary">Aggiungi un tipo</a>
        </div>
    </div>

@endsection