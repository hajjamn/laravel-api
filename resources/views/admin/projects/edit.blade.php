@extends('layouts.app')

@section('content')

    <main>
        <section>

            @if ($errors->any())
                <div class="container pt-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="container py-3">
                <div class="card">

                    <div class="card-header">
                        <h2>Edit project: {{ $project->title }}</h2>
                    </div>

                    <div class="card-body py-3">

                        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                            @method('PUT')
                            {{-- Cross Site Resource Forgery? --}}
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Example Project Title" value="{{ $project->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="type_id">Title</label>
                                <select name="type_id" id="type_id" class="form-control">
                                    <option value="">-- Select a type--</option>

                                    @foreach ($types as $type)
                                        <option @selected($type->id == old('type_id', $project->type_id)) value="{{ $type->id }}">{{ $type->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <h3>Select tags</h3>

                                    <div class="d-flex gap-2">

                                        @foreach ($technologies as $technology)
                                            <div class="form-check">
                                                <input name="technologies[]" class="form-check-input" type="checkbox"
                                                    value="{{ $technology->id }}" id="tech-{{ $technology }}"
                                                    @checked(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all())))>
                                                <label class="form-check-label" for="tech-{{ $technology->id }}">
                                                    {{ $technology->name }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="repo" class="form-label">Git Repository</label>
                                <input type="text" name="repo" class="form-control" id="repo"
                                    placeholder="repo-name-example" value="{{ $project->repo }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Boolean is awesome!">{{ $project->description }}</textarea>
                            </div>

                            <button class="btn btn-primary">Edit</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
