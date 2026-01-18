@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $note->title }}</h3>

            <p class="card-text">
                {{ $note->content }}
            </p>

            <hr>

            <p class="text-muted">
                Created at:
                {{ $note->created_at->format('d M Y, H:i') }}
            </p>

            <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
@endsection
