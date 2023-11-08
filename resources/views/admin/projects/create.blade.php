@extends('layouts.admin')

@section('content')
    <h1>Create new project</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function(alert) {
                new bootstrap.Alert(alert)
            })
        </script>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                        placeholder="Type the project title">
                    <small id="helpId" class="form-text text-muted">Type the project title (max: 50 characters)</small>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"
                        placeholder="Type the project description"></textarea>
                    <small id="helpId" class="form-text text-muted">Type the project description</small>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Choose project image</div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
