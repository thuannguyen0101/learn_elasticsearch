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
    <h1>Create Book </h1>
</div>

<div class="container">
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="form-name">Tên sách</label>
            <input type="text" id="form-name" name="name" class="form-control" placeholder="Tên sách">
          </div>
          <div class="form-group col-md-6">
            <label for="form-author">Tác giả</label>
            <input type="text" id="form-author" name="author" class="form-control" placeholder="Tác giả">
          </div>
        </div>
        <div class="form-group">
          <label for="form-nation">Quốc gia</label>
          <input type="text" id="form-nation" name="nation" class="form-control" placeholder="Quốc gia">
        </div>
        <div class="form-group">
          <label for="form-price">Giá sách</label>
          <input type="number" id="form-price" name="price" class="form-control" placeholder="Giá sách">
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>
      </form>
</div>

</body>
</html>
