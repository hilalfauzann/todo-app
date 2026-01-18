@extends('layouts.app')

@section('content')
    <h2>Add Note</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('notes.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content"
                      class="form-control"
                      rows="4">{{ old('content') }}</textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
