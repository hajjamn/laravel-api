@extends('layouts.app')

@section('content')

  <section>

    <div class="container py-3">
      <div class="card">
        {{-- CARD HEADER --}}
        <div class="card-header">
          <h2>Project: {{ $project->title }}</h2>
        </div>

        {{-- CARD BODY --}}
        <div class="card-body">

          <ul class="list-group">  
            <li class="list-group-item">
              <span>
                Nome repo: <a href="https://github.com/hajjamn/{{ $project->repo }}">{{ $project->repo }}</a>
              </span>
            </li>

            <li class="list-group-item">
              <span>
                @if ($project->type === null)
                Tipo assente.
              @else
                Tipo: {{ $project->type->name}}
              @endif
              </span>
            </li>

            <li class="list-group-item">
              <ul class="d-flex gap-2 list-unstyled">
                @foreach ($project->technologies as $technology)
                    <span class="badge text-bg-primary">{{ $technology->name }}</span>
                @endforeach
              </ul>
            </li>


            <li class="list-group-item">
              <span>
                @if ($project->description === null)
                  Descrizione assente.
                @else
                  Descrizione: {{ $project->description }}
                @endif
              </span>
            </li>
          </ul>

        </div>

        {{-- CARD FOOTER --}}
        <div class="card-footer">

          <div class="d-flex">
            <div class="me-3">
              <a href="{{ route('admin.projects.edit', $project) }}">
                <button class="btn btn-primary">Edit</button>
                </a>
            </div>
            <div>
              <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

@endsection