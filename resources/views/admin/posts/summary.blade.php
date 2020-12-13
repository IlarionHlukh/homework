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
                    <form method="post" action="{{route('show_posts.destroy', $post)}}">
                        @csrf
                        @method('delete')
                        <div class="container">
                            <div class="control">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
