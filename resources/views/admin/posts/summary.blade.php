<div class="content">

    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Назва</th>
        <th>Автор</th>
        <th>Категория</th>
        <th>Дата создания</th>
        <th>Действие</th>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <form method="post" action="">
                        @csrf
                        @method('delete')
                        <div class="container">
                            <div class="control">
                                <a href="{{route('show_posts.destroy', $post->id)}}" class="delete btn btn-danger btn-sm" data-id="{{ $post->id }}">Delete</a>
                            </div>
                        </div>
                    </form>
                </td>
        @empty
            <tr>
                <td colspan="3" class="text-center"><h2>Посты отсутствуют</h2></td>
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
                        '{{$post->title}} успішно видалений!',
                        'success'
                    )
                }
            })
    })

</script>


