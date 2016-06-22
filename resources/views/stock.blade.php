<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_x_token" content="{!! csrf_token() !!}">
    <meta name="_home_url" content="{!! URL::to('/') !!}">

    <title>Product Stock Details</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/base-theme.css') }}">
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Coalition Test</a>
        </div>        
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Stock <span class="sr-only">(current)</span></a></li>   
          </ul>          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Stock Overview</h1>

          <div class="row placeholders">
            
          </div>

          <div class="row">
          <div class="col-md-6"><h2>Product List</h2></div>
          <div class="col-md-6"><a href="#" id="add-product-btn" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-product-modal">Add Product</a></div>
          </div>

          
          <div class="table-responsive">
            <table class="table table-striped" id="product-list-table">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Quantity In Stock</th>
                  <th>Price Per Item</th>
                  <th>Datetime Submitted</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($stocks as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->quantity }}</td>
                  <td>{{ $row->price_per_unit }}</td>
                  <td>{{ $row->created_at }}</td>
                  <td>{{ $row->quantity * $row->price_per_unit }} </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4" class="text-right"> <strong>Grand Total</strong> </td>
                  <td><span id="grandTotal">0.00</span></td></td> 
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
      </div>
      <form id="add-product-form" name="add-product-form" method="">
      <div class="modal-body">
        
        <div class="form-group">
          <label for="productName">Product Name</label>
          <input type="text" class="form-control" id="productName" name="name" required>
        </div>

        <div class="form-group">
          <label for="productQuantity">Quantity In Stock</label>
          <input type="text" class="form-control" id="productQuantity" name="quantity" required>
        </div>

        <div class="form-group">
          <label for="productPrice">Price Per Item</label>
          <input type="text" class="form-control" id="productPrice" name="price_per_unit" required>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save-product">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Mainly scripts -->
<script src="{{ URL::asset('js/vendor.js') }}"></script>
<script src="{{ URL::asset('js/base-theme-plugin.js') }}"></script>
<script src="{{ URL::asset('js/application/application.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_x_token"]').attr('content')
        }
    });
</script>



  </body>
</html>
