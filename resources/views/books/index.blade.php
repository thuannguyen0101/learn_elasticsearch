<!DOCTYPE html>
<html lang="en">
<head>
    <title>Elasticsearch Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="/js/app.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Demo elasticsearch with Book model </h1>
</div>

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <span>Giá sách trung bình: {{$maxPrice['value'] ?? ''}}</span>
        <a href="{{route('books.create')}}" class="btn btn-primary">Tạo mới</a>
    </div>
    <form class="mb-2 mt-2" method="GET" action="{{route('books.index')}}">
        <div class="input-group">
            <input type="text" name="keyword" value="{{ request('keyword') ?? '' }}" class="form-control"
                   placeholder="Search this book">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    Search
                </button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sách</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Quốc gia</th>
            <th scope="col">Giá sách</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hoạt động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $key => $book)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->nation}}</td>
                <td>{{$book->price}}</td>
                <td>{{ $book->status === 1 ? 'ĐƯỢC BÁN' : 'KHÔNG ĐƯỢC BÁN'}}</td>
                <td class="text-center">
                    <a href="{{route('books.delete', $book->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                          </svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="w-25">
        {!! $paginate !!}
    </div>
</div>

</body>
</html>
