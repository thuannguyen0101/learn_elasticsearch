<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
  <form class="mb-2" method="GET" action="{{route('books.index')}}">
    <div class="input-group">
    <input type="text" name="keyword" value="{{ request('keyword') ?? '' }}" class="form-control" placeholder="Search this book">
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
      <th scope="col">Tác giả </th>
      <th scope="col">Quốc gia </th>
      <th scope="col">Giá sách </th>
      <th scope="col">Trạng thái </th>
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
    </tr>
    @endforeach
  </tbody>
</table>
</div>

</body>
</html>
