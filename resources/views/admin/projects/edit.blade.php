@extends('layouts.admin')

@section('content')
    <h1 class="my-3">Edit project number: {{ $project->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" aria-describedby="helpId" placeholder="Type the project title"
                        value="{{ $project->title }}" required maxlength="50">
                    <small id="helpId" class="form-text text-muted">Type the project title (max: 50 characters)</small>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        rows="3" placeholder="Type the project description">{{ $project->description }}</textarea>
                    <small id="helpId" class="form-text text-muted">Type the project description</small>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 d-flex">
                    <div class="me-3">
                        <div class="mb-2">Actual image:</div>
                        @if ($project->image)
                            @if (str_contains($project->image, 'http'))
                                <img width="200" src="{{ $project->image }}">
                            @else
                                <img width="200" src="{{ asset('storage/' . $project->image) }}">
                            @endif
                        @else
                            N/A
                        @endif

                    </div>
                    <div>
                        <label for="image" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Don't save</a>
                <button type="submit" class="btn btn-primary">Save changes</button>

            </form>
        </div>
    </div>
@endsection
