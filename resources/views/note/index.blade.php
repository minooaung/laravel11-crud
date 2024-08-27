<x-app-layout>
    <div class="note-containe py-12">
        <a href="{{ route('note.create') }}" class="new-note-btn">
            Create New Note
        </a>

        <div class="notes">
            <!-- Search Form -->
            <form method="GET" action="{{ route('note.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search notes" value="{{ request()->input('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            @if($notes->isEmpty())
                <p style="text-align: center; font-size: large;" class="py-12">No records found</p>
            @else
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Note</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                    <tr>
                      <th scope="row">{{$note->id}}</th>
                      <td>{{Str::words($note->note, 30)}}</td>
                      <td>{{$note->created_at}}</td>
                      <td>
                        <div class="note-buttons">
                            <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
                            <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                            <form action="{{ route('note.destroy', $note) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="note-delete-button">Delete</button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $notes->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>


    </div>
</x-app-layout>
