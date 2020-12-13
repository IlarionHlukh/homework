<div class="content">

    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created_at</th>
        <th class="text-right">Действие</th>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->is_admin == 1)
                        Admin
                    @else
                        User
                    @endif
                </td>
                <td>{{$user->created_at}}</td>
                <td>
                    <form method="post" action="{{ route('users.destroy', $user) }}">
                        @csrf
                        @method('delete')
                        <div class="container">
                            <div class="control">
                                @if($user->is_admin !== 1)
                                    <a href="{{ route('users.update',$user) }}" class="button is-danger">
                                        Make Admin
                                    </a>
                                @endif
                            </div>
                            <div class="control">
                                @if($user->is_admin !== 1)
                                    <button type="submit" class="button is-danger">Delete</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </td>
        @empty
            <tr>
                <td colspan="3" class="text-center"><h2>Пользователи отсутствуют</h2></td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
