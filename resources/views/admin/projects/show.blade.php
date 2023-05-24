@extends('layouts/admin')

@section('content')

<div class="main pt-5">
    <h1 class="">Visualizzazione progetto</h1>
    <span>Categoria: {{$project->type->name ?? 'nessuna'}}</span>

    <hr class="mb-4">

    <div class="py-3">
        <h2 class="text-center">
            {{$project->title}}
            <br>
            <small>
                <pre class="fs-5">
                    ({{$project->slug}})
                </pre>
            </small>
        </h2>  
    </div>

    <hr>

    <p>
        {{$project->content}}
    </p>

</div>

<div class="d-flex justify-content-around">
    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary">Modifica il progetto</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Elimina
  </button>
</div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di volere eliminare il progetto "{{$project->title}}"?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina il progetto</button>
        </form>    
        </div>
      </div>
    </div>
  </div>







@endsection