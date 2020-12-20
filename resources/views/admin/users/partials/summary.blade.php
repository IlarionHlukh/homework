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
                    <form method="post" action="">
                        @csrf
                        @method('delete')
                        <div class="container">
                            <div class="control">
                                @if($user->is_admin !== 1)
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-success">
                                        Make Admin
                                    </a>
                                @endif
                                    @if($user->is_admin == 1)
                                        <a href="{{ route('users.show',$user->id) }}" class="btn btn-outline-success">
                                            Make User
                                        </a>
                                    @endif
                            </div>
                            <div class="control">
                                @if($user->is_admin !== 1)
                                    <a href="{{ route('users.destroy', $user->id) }}" class="delete btn btn-danger btn-sm" data-id="{{$user->id}}">Delete</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
        $('.delete').on('click', function(e) {
            if(!confirm("Do you really want to do this?")) {
                return false;
            }
            e.preventDefault();
            var id = $(this).attr('data-id');
            var el = this;
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;
            $.ajax(
                {
                    type:'POST',
                    url: url.href,
                    data: {
                        _method: 'DELETE',
                        _token: token,
                        id: id
                    },
                success: function(response){
                    $(el).closest( "tr" ).remove();
                    Swal.fire(
                        'Увага',
                        '{{$user->name}} успішно видалений!',
                        'success'
                    )
            }
        })
  })

</script>
