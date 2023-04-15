<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Product Data</h1>
        <a href="{{route('product.create')}}" class="btn btn-primary mb-3">Add Product</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>  
        @endif
        <div class="pb-3">
                  <form class="d-flex" action="{{url('product')}}" method="get">
                  @csrf
                      <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Enter Keyword" aria-label="Search">
                      
                      <button class="btn btn-primary" type="submit">Search</button>
                  </form>
                </div>
        </br>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>NO</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th>Action</th>
                    </thead>    
                    <tbody>
                        @foreach ($product as $no => $hasil)
                            <tr>
                                <th>{{ $no+1 }}</th>
                                <td>{{ $hasil->product_code}}</td>
                                <td>{{$hasil->product_name}}</td>
                                <td>{{$hasil->product_category}}</td>
                                <td>{{$hasil->price}}</td>
                                <td>{{$hasil->quantity}}</td>
                                <td>
                                    <form action="{{route('product.destroy', $hasil->id)}}" method="POST">
                                    @csrf 
                                    @method('delete')
                                        <a href="{{ route('product.edit',  $hasil) }}" class="btn btn-success btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="h-10 pagination pagination-sm">
                        {{$product->links()}}
                    </ul>
                </nav>
                
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>