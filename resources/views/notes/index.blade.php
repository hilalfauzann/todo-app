@extends('layouts.app')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">My Notes</h2>

        <a href="{{ route('notes.create') }}" class="btn btn-primary">
            + Add Note
        </a>
    </div>

    <!-- FLASH MESSAGE -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- LIST NOTES -->
    @forelse ($notes as $note)
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title">
                    {{ $note->title }}

                    <span class="badge {{ $note->is_done ? 'bg-success' : 'bg-secondary' }}">
                        {{ $note->is_done ? 'Done' : 'Pending' }}
                    </span>
                </h5>

                <p class="card-text">{{ $note->content }}</p>

                <div class="mt-2">
                    <!-- TOGGLE STATUS -->
                    <form action="{{ route('notes.toggle', $note) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-outline-success btn-sm">
                            {{ $note->is_done ? 'Undo' : 'Mark Done' }}
                        </button>
                    </form>

                    <!-- VIEW -->
                    <a href="{{ route('notes.show', $note) }}"
                       class="btn btn-info btn-sm">
                        View
                    </a>

                    <!-- EDIT -->
                    <a href="{{ route('notes.edit', $note) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <!-- DELETE -->
                    <form action="{{ route('notes.destroy', $note) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this note?')">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    @empty
        <p class="text-muted">No notes yet.</p>
    @endforelse

@endsection
