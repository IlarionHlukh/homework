@foreach($categories as $category)
    <tr>
        <td>{{$category->title}}</td>
        <td>{{$category->published}}</td>
    </tr>
@endforeach
