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
    <div class="container" id="txtStatus">
      <h2>Đăng tin miễn phí</h2>
      <br />
      <div class="form-group">
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
        <button class="btn btn-danger" type="button" id="btnCreatePost">Đăng tin</button>
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
    $(document).ready(function() {
      // Thêm sự kiện click cho nút Đăng tin
      $("#btnCreatePost").on("click", function() {
        // Lấy dữ liệu từ các trường input
        var productName = $("#txtProductName").val();
        var price = $("#txtPrice").val();
        var category = $("#txtCategory").val();
        var imageLink = $("#txtImageLink").val();
        var productLink = $("#txtProductLink").val();

        // Gửi dữ liệu qua Ajax đến createpostcontroller.php
        $.ajax({
          url: '../server/createpostcontroller.php',
          type: 'POST',
          data: {
            action: 'create',
            productName: productName,
            price: price,
            category: category,
            imageLink: imageLink,
            productLink: productLink
          },
          success: function(response) {
            console.log(response);

            // Kiểm tra và xử lý phản hồi từ server nếu cần
          },
          error: function(error) {
            console.log('Error creating post:', error);
          }
        });
      });
    });
  </script>
</body>

</html>