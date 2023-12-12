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
      background-color: #FFFFFF;
      color: #000000;
      font-family: Arial;
      font-weight: normal;
      font-size: 13px;
      line-height: 1.1875;
      margin: 0;
      padding: 0;
    }

    a {
      color: #0000FF;
      text-decoration: underline;
    }

    a:visited {
      color: #800080;
    }

    a:active {
      color: #FF0000;
    }

    a:hover {
      color: #0000FF;
      text-decoration: underline;
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
    }

    #Extension1,
    #Extension1 input,
    #Extension1 button,
    #Extension1 .button,
    #Extension1 select,
    #Extension1 textarea {
      box-sizing: border-box;
      color: #454545;
      font-family: Arial;
      font-size: 11px;
    }

    #Extension1 .thead {
      background: #F9F9F9;
      color: #333333;
      font-weight: bold;
    }

    #Extension1 .thead a {
      color: #333333;
    }

    #Extension1 td {
      vertical-align: top;
      font-size: 11px;
    }

    #Extension1 .button {
      background: #5CB85C;
      border: 1px solid #4CAE4C;
      border-radius: 4px;
      color: #FFFFFF;
      padding: 6px 12px;
      text-decoration: none;
    }

    #Extension1 .button-update {
      background: #EC971F;
      border: 1px solid #D58512;
    }

    #Extension1 .button-delete {
      background: #C9302C;
      border: 1px solid #AC2925;
    }

    #Extension1 input,
    #Extension1 select,
    #Extension1 textarea {
      background: #FFFFFF;
      border: 1px solid #CCCCCC;
      border-radius: 4px;
      color: #555555;
      padding: 6px 12px;
    }

    #Extension1 .required {
      background: #FFF897 !important;
    }

    #Extension1 input:focus,
    #Extension1 textarea:focus,
    #Extension1 select:focus {
      border-color: #66AFE9;
      box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.075), 0px 0px 8px rgba(102, 175, 233, 0.60);
      outline: 0;
    }

    #Extension1 .table {
      border: 1px solid #DDDDDD;
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
    }

    #Extension1 .table tr {
      background-color: #FFFFFF;
    }

    #Extension1 .table tr:nth-of-type(odd) {
      background-color: #F9F9F9;
    }

    #Extension1 .table thead,
    #Extension1 .table tbody,
    #Extension1 .table tr,
    #Extension1 .table th,
    #Extension1 .table td {
      border: 1px solid #DDDDDD;
      padding: 10px;
    }

    #Extension1 div table td {
      padding: 10px;
    }

    #Extension1 input,
    #Extension1 select {
      height: 27px;
    }

    #Extension1 input,
    #Extension1 select,
    #Extension1 textarea {
      width: 100%;
    }

    #Extension1 textarea {
      height: 200px;
    }

    #Extension1 #search_name,
    #Extension1 input[type='checkbox'] {
      width: auto !important;
    }

    #Extension1 .arrow-up {
      display: inline-block;
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-bottom: 5px solid #333333;
    }

    #Extension1 .arrow-down {
      display: inline-block;
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 5px solid #333333;
    }

    #Extension1 .header {
      margin: 0;
      width: 100%;
    }

    #Extension1 .nav {
      margin: 10px 0 0 0;
      text-align: center;
      width: 100%;
    }

    #Extension1 .pagination {
      display: inline-block;
      list-style: none;
      padding: 0;
      border-radius: 4px;
      font-weight: normal;
      font-size: 0;
    }

    #Extension1 .pagination>li {
      display: inline;
      font-size: 11px;
    }

    #Extension1 .pagination>li>a,
    #Extension1 .pagination>li>span {
      position: relative;
      float: left;
      padding: 6px 12px;
      text-decoration: none;
      background-color: #FFFFFF;
      border: 1px #DDDDDD solid;
      color: #5CB85C;
      margin-left: -1px;
    }

    #Extension1 .pagination>li:first-child>a,
    #Extension1 .pagination>li:first-child>span {
      margin-left: 0;
      border-bottom-left-radius: 4px;
      border-top-left-radius: 4px;
    }

    #Extension1 .pagination>li:last-child>a,
    #Extension1 .pagination>li:last-child>span {
      border-bottom-right-radius: 4px;
      border-top-right-radius: 4px;
    }

    #Extension1 .pagination>.active>a,
    #Extension1 .pagination>.active>span,
    #Extension1 .pagination>.active>a:hover,
    #Extension1 .pagination>.active>span:hover,
    #Extension1 .pagination>.active>a:focus,
    #Extension1 .pagination>.active>span:focus {
      z-index: 2;
      background-color: #5CB85C;
      border-color: #5CB85C;
      color: #FFFFFF;
      cursor: default;
    }

    #Extension1 .pagination>.disabled>span,
    #Extension1 .pagination>.disabled>span:hover,
    #Extension1 .pagination>.disabled>span:focus,
    #Extension1 .pagination>.disabled>a,
    #Extension1 .pagination>.disabled>a:hover,
    #Extension1 .pagination>.disabled>a:focus {
      background-color: #FFFFFF;
      color: #777777;
      cursor: not-allowed;
    }

    .fade {
      opacity: 0;
      -webkit-transition: opacity .15s linear;
      transition: opacity .15s linear;
    }

    .fade.show {
      opacity: 1;
    }

    .close {
      color: #000;
      float: right;
      font-size: 1.5rem;
      font-weight: 700;
      line-height: 1;
      margin: 0;
      opacity: 0.5;
      text-shadow: 0px 1px 0px #fff;
    }

    button.close {
      background-color: transparent;
      border: 0;
      padding: 0;
      -webkit-appearance: none;
    }

    .alert-dismissible .close {
      color: inherit;
      position: absolute;
      top: 0px;
      right: 0px;
      padding: .75rem 1.25rem;
    }

    :not(:disabled):not(.disabled).close {
      cursor: pointer;
    }

    .alert {
      border: 1px solid transparent;
      border-radius: 4px;
      box-sizing: border-box;
      padding: 15px;
      position: relative;
      width: 100%
    }

    .alert-dismissable,
    .alert-dismissible {
      padding-right: 35px;
    }

    .alert-success {
      background-color: #dff0d8;
      border-color: #d6e9c6;
      color: #3c763d;
    }

    .alert-danger {
      background-color: #f2dede;
      border-color: #ebccd1;
      color: #a94442;
    }

    #wb_LayoutGrid1 {
      clear: both;
      position: relative;
      table-layout: fixed;
      display: table;
      text-align: center;
      width: 100%;
      background-color: transparent;
      background-image: none;
      border: 0px solid #CCCCCC;
      box-sizing: border-box;
      margin: 0;
    }

    #LayoutGrid1 {
      box-sizing: border-box;
      padding: 0px 15px 0px 15px;
      margin-right: auto;
      margin-left: auto;
    }

    #LayoutGrid1>.row {
      margin-right: -15px;
      margin-left: -15px;
    }

    #LayoutGrid1>.row>.col-1 {
      box-sizing: border-box;
      font-size: 0px;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
      position: relative;
    }

    #LayoutGrid1>.row>.col-1 {
      float: left;
    }

    #LayoutGrid1>.row>.col-1 {
      background-color: transparent;
      background-image: none;
      border: 0px solid #FFFFFF;
      width: 100%;
      text-align: left;
    }

    #LayoutGrid1:before,
    #LayoutGrid1:after,
    #LayoutGrid1 .row:before,
    #LayoutGrid1 .row:after {
      display: table;
      content: " ";
    }

    #LayoutGrid1:after,
    #LayoutGrid1 .row:after {
      clear: both;
    }

    @media (max-width: 480px) {
      #LayoutGrid1>.row>.col-1 {
        float: none;
        width: 100% !important;
      }
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
  <script src="jquery-3.4.1.min.js"></script>
  <script src="util.min.js"></script>
  <script src="alert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $(document).ready(function() {
      // Fetch and display products when the page is ready
      fetchProducts();

      function fetchProducts() {
        $.ajax({
          url: '../server/mangepost.php',
          type: 'GET',
          data: {
            action: 'fetch'
          },
          success: function(response) {
            console.log(response); // Log the response to the console

            for (var i = 0; i < response.length; i++) {
              console.log('Processing product:', response[i]);

              var row = '<tr>' +
                '<td>' + response[i].Id + '</td>' +
                '<td>' + response[i].ProductName + '</td>' +
                '<td>' + response[i].SalePrice + '</td>' +
                '<td>' + response[i].CategoryName + '</td>' +
                '<td><button class="button-edit" data-id="' + response[i].Id + '">Edit</button></td>' +
                '<td><button class="button-delete" data-id="' + response[i].Id + '">Delete</button></td>' +
                '</tr>';

              $("#myTable").append(row);
            }
          },
          error: function(error) {
            console.log('Error fetching products:', error);
          }
        });
      }
    });

    $(document).ready(function() {
      // Thêm sự kiện click cho nút Delete
      $("#myTable").on("click", ".button-delete", function(e) {
        e.preventDefault(); // Prevent the default behavior of the button click event
        var postId = $(this).data("id");

        // Hiển thị hộp thoại xác nhận
        var isConfirmed = confirm("Bạn có chắc chắn muốn xóa không?");
        
        // Kiểm tra xem người dùng đã xác nhận hay không
        if (isConfirmed) {
            // Gọi hàm xóa sản phẩm qua Ajax
            deletePost(postId);
        }
      });

      // Hàm xóa sản phẩm
      function deletePost(postId) {
        $.ajax({
          url: '../server/deletecontroller.php', // Assuming the new PHP file is deletecontroller.php
          type: 'POST',
          data: {
            action: 'delete',
            id: postId
          },
          success: function(response) {
            console.log(response);

            // Kiểm tra nếu có lỗi từ phía server
            if (response.error) {
              console.error('Error deleting post:', response.error);
              return;
            }

            // Xóa dòng tương ứng trong bảng
            $("#myTable").find(`[data-id='${postId}']`).closest('tr').remove();
          },
          error: function(error) {
            console.log('Error deleting post:', error);
          }
        });
      }
    });

     // Handle click event for the "Edit" button
     $(document).ready(function() {
     $("#myTable").on("click", ".button-edit", function(e) {
      e.preventDefault(); // Prevent the default behavior of the button click event
      var postId = $(this).data("id");

      // Redirect to the editpost.php page with the product ID
      window.location.href = "editpost.php?id=" + postId;
    });
  });

 
  </script>

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
      <h2>Quản lý tin đăng</h2>
      <br />
      <div id="wb_LayoutGrid1">
        <div id="LayoutGrid1">
          <div class="row">
            <div class="col-1">
              <div id="wb_Extension1" style="display:inline-block;width:100%;z-index:0;">
                <div id="Extension1">
                  <div class="header">
                    <table>
                      <tbody>
                        <tr>
                          <td style="padding-left:0;width:100%"><button class="button" onclick="window.location='createpost.php'">Add Record</button></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>ProductName</th>
                        <th>SalePrice</th>
                        <th>CategoryName</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">

                    </tbody>
                  </table>
                  <button class="button" type="button">See more</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
</body>

</html>