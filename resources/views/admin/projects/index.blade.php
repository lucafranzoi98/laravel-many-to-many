@extends('layouts.admin')

@section('content')
    <h1>All Projects</h1>

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
                        <td>{{$project->id}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->image}}</td>
                        <td>{{$project->description}}</td>
                        <td>View/EditDelete</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
