<x-layouts.dashboard>
    <x-slot name="page">users.view</x-slot>
    <x-slot name="title">All Users</x-slot>
    <x-slot name="card_title">All Users</x-slot>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
    </x-slot>

    <div class="table-responsive">
        <table class="table" id="table">
            <thead class=" text-primary">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Creation Date</th>
                    <th class="text-center th-action">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{ $user->username }}</td>
                    <td class="text-center">{{ $user->role == 'super_admin' ? 'super admin' : $user->role }}</td>
                    <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                    <td class="td-actions text-center">
                        <a href="{{ route('users.edit',$user->id) }}"><button type="button" rel="tooltip" class="btn btn-success btn-round">
                            <i class="material-icons" style=" display: contents;">edit</i>
                        </button></a>
                        <button type="button" data-toggle="modal" data-target="#exampleModal{{ $user->id }}"   rel="tooltip" class="btn btn-danger btn-round">
                            <i class="material-icons" style=" display: contents;">close</i>
                        </button>
                        <form class="delete" action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hi  @if(Auth::user()->name){{ Auth::user()->name }}@endif !!! </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <center>   <div class="modal-body">
                                    Are you sure you want to delete this user?
                                    </div></center>
                                    <div class="modal-footer">
                                    <button type="button" id="close" class="btn btn-secondary" style=" right: 30px;" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>
