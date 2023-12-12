<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>RaoVat.Com</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  <!-- FontAwsome -->
  <link rel="stylesheet" href="../resources/css/font-awesome.min.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
    body {
      font-family: 'Roboto';
    }

    #left-sidebar,
    #main-content {
      height: 500px;
      border: 1px solid red;
      margin-bottom: 50px;
    }

    #footer {
      text-align: center;
    }

    .navbar-inverse {
      background-color: #ED7D31;
    }

    .navbar-inverse .navbar-nav>li>a {
      color: #222;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:#222;" class="navbar-brand" href="index.php">RaoVat.Com</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Sản Phẩm</a></li>
			<li><a href="#">About Us</a></li>            
          </ul> -->
        <ul class="nav navbar-nav navbar-right">
          <li><a href="createpost.php">Đăng Tin</a></li>
          <!-- <li><a href="#">Đăng Ký</a></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="managepost.php">Quản Lý Tin Đăng</a></li>
          <!-- <li><a href="#">Đăng Ký</a></li> -->
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>

  <!-- Place your code at here! -->
  <div id="main">
    <div class="container">
      <h2>Chỉnh Sửa Tin</h2>
      <br />
      <div class="form-group">
        <input type="hidden" id="postId" name="postId" value="">
        <label for="txtProductName">Tên sản phẩm</label>
        <input type="text" class="form-control" id="txtProductName" placeholder="Iphone 6 like new 99%">
      </div>
      <div class="form-group">
        <label for="txtPrice">Giá bán</label>
        <input type="text" class="form-control" id="txtPrice" placeholder="8000000">
      </div>
      <div class="form-group">
        <label for="txtCategory">Loại</label>
        <input type="text" class="form-control" id="txtCategory" placeholder="Camera,Phone,...">
      </div>
      <div class="form-group">
        <label for="txtImageLink">Link hình ảnh</label>
        <input type="text" class="form-control" id="txtImageLink" placeholder="http://static.lazada.vn/p/image-33784-1-product.jpg">
      </div>
      <div class="form-group">
        <label for="txtProductLink">Link sản phẩm</label>
        <input type="text" class="form-control" id="txtProductLink" placeholder="http://lazada.vn/product/iphone-8.html">
      </div>
      <div class="input-group-btn">
        <button class="btn btn-danger" id="btnUpdate" type="button">Cập Nhật</button>
      </div>
      <br />
    </div>
  </div>

  <!-- Footer -->
  <div id="footer">
    <div class="container">
      <p>All rights reserved by RaoVat.Com</p>
    </div>
  </div>

  <!-- DO NOT REMOVE THE 2 LINES -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    // Function to get the product ID from the URL
    function getProductIdFromUrl() {
      var urlParams = new URLSearchParams(window.location.search);
      return urlParams.get('id');
    }

    // Function to fetch product details and update form fields
    function fetchProductDetails() {
      var productId = getProductIdFromUrl();

      if (productId) {
        $.ajax({
          url: '../server/fetchproduct.php',
          type: 'GET',
          data: {
            id: productId
          },
          success: function(response) {
            $("#txtProductName").val(response.ProductName);
            $("#txtPrice").val(response.SalePrice);
            $("#txtCategory").val(response.CategoryName);
            $("#txtImageLink").val(response.ImageLink);
            $("#txtProductLink").val(response.ProductLink);

            // Update the value of postId input
            $("#postId").val(productId);
          },
          error: function(error) {
            console.log('Error fetching product details:', error);
          }
        });
      } else {
        console.log('Product ID not found in the URL.');
      }
    }

    // Call the function to fetch and update product details on page load
    $(document).ready(function() {
      fetchProductDetails();
    });

    // Ajax request for updating post
    $(document).ready(function() {
      $("#btnUpdate").click(function() {
        // Gather data from input fields
        var productName = $("#txtProductName").val();
        var price = $("#txtPrice").val();
        var category = $("#txtCategory").val();
        var imageLink = $("#txtImageLink").val();
        var productLink = $("#txtProductLink").val();
        var postId = $("#postId").val(); // Get postId from the hidden input field

        // Ajax request
        $.ajax({
          url: '../server/editpostcontroller.php',
          type: 'POST',
          data: {
            action: 'update',
            productName: productName,
            price: price,
            category: category,
            imageLink: imageLink,
            productLink: productLink,
            postId: postId // Include postId in the data
          },
          success: function(response) {
            // Handle success response
            console.log(response);
            window.location.href = "http://localhost:3000/client/managepost.php";
            // You can add additional logic here if needed
          },
          error: function(error) {
            // Handle error response
            console.log('Error updating post:', error);
          }
        });
      });
    });
  </script>

</body>

</html>