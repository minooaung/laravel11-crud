<x-app-layout>
    <div class="note-containe py-12">
        <div class="notes">
            <!-- Search Form -->
            <form method="GET" action="{{ route('user.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search notes" value="{{ request()->input('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
</x-app-layout>
