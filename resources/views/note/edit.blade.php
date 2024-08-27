<x-app-layout>
    <div class="note-container single-note">
        <h1 class="text-3xl py-4">Edit</h1>

        <form action="{{ route('note.update', $note) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="note">Note</label>
                <textarea id="note" name="note" rows="6" class="form-control" placeholder="Enter your note here">{{ $note->note }}</textarea>
            </div>

            <div class="py-6">
                <a href="{{ route('note.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                <button class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
