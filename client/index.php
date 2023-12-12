<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RaoVat.Com</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  <!-- FontAwsome -->
  <link rel="stylesheet" href="../resources/css/font-awesome.min.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

  <!-- Custom Styles -->
  <style>
    body {
      font-family: 'Roboto';
    }

    .navbar-inverse {
      background-color: #ED7D31;
    }

    .navbar-inverse .navbar-nav>li>a {
      color: #222;
    }

    #main {
      margin-top: 20px;
    }

    #footer {
      text-align: center;
      margin-top: 50px;
    }

    #search-result,
    #product-list {
      margin-top: 20px;
    }

    .product {
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 20px;
    }

    .product img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:#222;" class="navbar-brand" href="index.php">RaoVat.Com</a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="createpost.php">Đăng Tin</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="managepost.php">Quản Lý Tin Đăng</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="main" class="container">
    <form action="javascript:void(0);" method="GET" id="search-form">
      <input type="hidden" name="action" value="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm..." name="keyword" id="keyword">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
    </form>

    <div id="search-result" class="row"></div>

  </div>

  <div id="footer">
    <div class="container">
      <p>All rights reserved by RaoVat.Com</p>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Fetch and display products when the page is ready
      fetchProducts();

      function fetchProducts() {
        $.ajax({
          url: '../server/postcontroller.php',
          type: 'GET',
          data: {
            action: 'fetch'
          },
          success: function(response) {
            // Update the product-list div with the received HTML
            $('#search-result').html(response);
          },
          error: function(error) {
            console.log('Error fetching products:', error);
          }
        });
      }

      // Additional AJAX functionality for search
      $('#search-form').submit(function(e) {
        e.preventDefault();
        var keyword = $('#keyword').val();

        $.ajax({
          url: '../server/postcontroller.php',
          type: 'GET',
          data: {
            action: 'searchProduct',
            keyword: keyword
          },
          success: function(response) {
            $('#search-result').html(response);
          },
          error: function(error) {
            console.log('Error searching products:', error);
          }
        });
      });
    });
  </script>
</body>

</html>