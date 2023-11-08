@extends('layouts.admin')

@section('content')
    <h1>All Projects</h1>

    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add Project</a>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Message: </strong> {{session('message')}}
        </div>
    @endif

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
                                <img width="100" src="{{asset('storage/' . $project->image)}}">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $project->description }}</td>
                        <td>View/EditDelete</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
