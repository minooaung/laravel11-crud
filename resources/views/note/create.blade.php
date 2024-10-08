<x-app-layout>
    <div class="note-container single-note">
        <h1 class="text-3xl py-4">Create new Note</h1>
        <form action="{{ route('note.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="note">Note</label>
                <textarea id="note" name="note" rows="10" class="form-control" placeholder="Enter your note here"></textarea>
            </div>
            <div class="py-6">
                <a href="{{ route('note.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                <button class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
