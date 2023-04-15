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
        <a href="{{route('main')}}" class="btn btn-primary mb-3">Back</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf 
                    <div class="mb-3">
                        <label for="product_code" class="form-label">Product code</label>
                        <input type="text" name="product_code" class="form-control" id="product_code" >
                        <label for="product_name" class="form-label">Product name</label>
                        <input type="text" name="product_name" class="form-control" id="product_name" >
                        <label for="product_category" class="form-label">Product category (Stationery,Food,Electronic,other)</label>
                        <input type="text" name="product_category" class="form-control" id="product_category" >
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price" >
                        <label for="quantity" class ="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)

        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
        @endforeach
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  <!-- /resources/views/post/create.blade.php -->
 

</html>