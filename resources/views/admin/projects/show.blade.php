@extends('layouts.admin')

@section('content')
    <h1 class="my-3">{{ $project->title }}</h1>

    <div class="card" style="width: 40%">
        @if ($project->image)
            @if (str_contains($project->image, 'http'))
                <img class="card-img-top" src="{{ $project->image }}">
            @else
                <img class="card-img-top" src="{{ asset('storage/' . $project->image) }}">
            @endif
        @else
            <div class="m-3">N/A</div>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <div>
                <span>Code link: </span>
                <a href="{{ $project->code_link }}" target="_blank" class="card-link">{{ $project->code_link }}</a>
            </div>
            <div>
                <span>Preview link: </span>
                <a href="{{ $project->preview_link }}" target="_blank" class="card-link">{{ $project->preview_link }}</a>
            </div>
        </div>
    </div>



    <div class="my-3">
        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning text-white">Edit</a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return to all projects</a>

    </div>
    </div>
@endsection
