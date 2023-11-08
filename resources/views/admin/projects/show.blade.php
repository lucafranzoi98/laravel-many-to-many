@extends('layouts.admin')

@section('content')
    <h1 class="my-3">
        Project number: {{ $project->id }}</h1>
    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        @if ($project->image)
                            @if (str_contains($project->image, 'http'))
                                <img width="200" src="{{ $project->image }}">
                            @else
                                <img width="200" src="{{ asset('storage/' . $project->image) }}">
                            @endif
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $project->description }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return to all projects</a>
    </div>
@endsection
