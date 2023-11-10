@extends('layouts.admin')

@section('content')
    <h1 class="my-3">Trashed Projects</h1>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Message: </strong> {{ session('message') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success me-2" href="{{ route('admin.projects.index') }}">All projects</a>
        <a class="btn btn-danger" href="{{ route('admin.projects.trash') }}">Trash</a>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Links</th>
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
                                    <img width="100" src="{{ $project->image }}">
                                @else
                                    <img width="100" src="{{ asset('storage/' . $project->image) }}">
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="{{ $project->code_link }}" target="_blank" class="btn btn-sm btn-dark mb-2"><i
                                        class="fa-solid fa-code"></i></a>
                                <a href="{{ $project->preview_link }}" target="_blank" class="btn btn-sm btn-dark"><i
                                        class="fa-solid fa-link"></i></a>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-success me-2" href="{{ route('admin.projects.restore', $project->slug) }}">Restore</a>
                            <a class="btn btn-danger" href="{{ route('admin.projects.forceDelete', $project->slug) }}">Delete</a>                            
                        </td>

                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
