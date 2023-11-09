<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Inventory Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link text-light" href="/">Products</a>
    </li>
  </ul>
</nav>

    <div class=" mt-4">
        <div class="row">
            <div class="col-6">
                <h1 class="ml-5">Store Products</h1>
            </div>
            <div class="col-6 text-right">
                <a href="/products/create" class="btn btn-dark mr-5">Create</a>
            </div>
        </div>
    </div>

    <table class="table table-hover text-center mt-5">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Product Name</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->index + 1}}</td>
                <td>
                    <a href="/products/{{$product->id}}/show" class="text-dark">{{ $product->product_name }}</a>
                </td>
                <td><img src="products/{{ $product->image }}" class="rounded-circle" width="30" height="30"></td>
                <td>
                    <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                    <form method="POST" action="products/{{$product->id}}/delete" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container ml-5">
    {{$products->links()}}
    </div>
</body>

</html>
