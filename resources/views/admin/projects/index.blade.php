@extends('layouts.admin')

@section('content')
    <h1 class="my-3">All Projects</h1>

    
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Message: </strong> {{ session('message') }}
    </div>
    @endif
    
    <a class="btn btn-primary mb-3" href="{{ route('admin.projects.create') }}">Add Project</a>
    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>
                            @if ($project->image)
                                @if (str_contains($project->image, 'http'))
                                    <img width="100" src="{{$project->image}}">
                                @else
                                    <img width="100" src="{{ asset('storage/' . $project->image) }}">
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-primary">View</a>
                            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-warning text-white">Edit</a>
                            Delete</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
