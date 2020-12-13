<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
<div>
    <img src="{{asset('storage/image/image/1.jpg')}}" width="100" alt="image"/>
</div>
<div class="field">
    <div class="control">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input type="text" name="title" value="{{ old('title') }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Content</label>
                <div class="control">
                    <textarea name="content" class="textarea" placeholder="Content" minlength="5" maxlength="2000" required rows="10"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                    <textarea name="category" class="textarea" placeholder="category" minlength="1" maxlength="100" required rows="3"></textarea>
                </div>
            </div>
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="file" multiple name="image">
            <button type="submit">Загрузить</button>
        </form>
    </div>
</div>
<img src="" alt="" class="img-fluid">
</body>
</html>
