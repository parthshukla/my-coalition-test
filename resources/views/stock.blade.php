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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
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

          <h2 class="sub-header">Product List</h2>
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
