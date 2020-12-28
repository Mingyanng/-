
<?php 
  require("../connection/connect.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
body{padding-top:120px;}
h3{
padding:5px;
border-bottom:1px solid #ddd;
text-align:center;
}
li{
list-style-type:square;
margin:10px 0;
}
em{
color:#c7254e;
font-style: inherit;
background-color: #f9f2f4;
}
.alert1{height:23px;}
.ab1{ position:relative; z-index:5;}
.input-group{margin:10px 0px;}
    .loginalert{
        color:#FFFFFF;
        
    }    
</style>
    
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- webpageicon -->
  <link rel="Bookmark" href="../webpageicon/111.ico">
  <link rel="shortcut icon" href="../webpageicon/111.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>サインイン</title>
</head>
<body>
    <div class="alert1" id="sd" style="text-align:center;">
        </div>
　<div class="col-md-4 col-md-offset-4 ab1">
　　<div class="well col-md-10" style="background-color:#242424">
      <h3><font  color="#FFFFFF">肉のサカタ管理システム</font></h3>    
      <form class="user" method="post" action="test/check.php">
        <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
          <input type="text" class="form-control userid" placeholder="ユーザー名" aria-describedby="sizing-addon1">
        </div>
        <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control password" placeholder="パスワード" aria-describedby="sizing-addon1">
        </div>
        <p class="loginalert">
      </p>
        <button  type="button"  class="btn btn-default btn-block login">サインイン</button>
      </form>
　　</div>
　</div>
  <span style="position:absolute; left:0px; top:0px; width:100%; position:fixed;height:100%">
    <img src="../../../dist/img/bpicture4.jpg" width="100%" height="100%";>
  </span>
</body>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../../dist/js/sign_in/sign_in_post.js"></script>
</html>