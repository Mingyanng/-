<?php
// require("connect.php");
// session_start();
// if (empty($_POST['id'])){
//    header("LOCATION: admin.php");
//  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style type="text/css">
  
body{padding-top: 170px;}
h3{
padding:5px;
border-bottom:1px solid #000000;
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


</style>

    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../../dist/css/skins/_all-skins.min.css">
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
</head>
<body>
  <!-- Login-boder -->
　<div class="col-md-4 col-md-offset-4 ab1">
　　<div class="well col-md-10" >
      <h3>肉のサカタ管理システム</h3>
      
        <div class="alert1" id="sd1" style="text-align:center;">
        </div>

          <p>前回ログイン日時を選択してください</p>
          
      <form name="captcha" method="post" action="../test/check1.php">
          
        <div class="input-group input-group-md">          
          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i></span>
          <input type="text" name="code1" id="captcha1" class="form-control" placeholder="時間を選択してください" aria-describedby="sizing-addon1">
        </div>
        <input name="code1" id="denglu1" type="button" value="送信"  class="btn btn-success btn-block" />
      </form>
      <form  id="form3" method="post" action="../test/check2.php">
        <div style="margin-top:5px;">
         <input  id="denglu2" name="code2"  type="button" value="コードを再送信"  class="btn btn-success btn-block 222" />
        </div>
      </form>
　　</div>
　</div>
<!-- backgroundimage -->
  <span style="position:absolute; left:0px; top:0px; width:100%; position:fixed;height:100%">
    <img src="../../../../dist/img/bpicture5.jpg" width="100%" height="100%";>
  </span>

<script type="text/javascript">
var clickwww;
$('#denglu1').click(function(){
  clickwww=$(this);
  clickwww.attr("disabled",true);
    $.ajax({
      type:"post",
      url:"../test/check1.php",
      data:{iid1:$('#iid').val(),pw1:$('#ppw').val(),code1:$('#captcha1').val()},
 　　 success:function(data){
      data=$.trim(data);
      if (data.indexOf("wait...")!=-1){
      window.location.href="../../admin.php";
          clickwww.attr("disabled",false);
      }else
      $('#sd1').html(data);
      console.log(data);
      //clickwww.attr("disabled",false);
        }
    })
})
</script>


<script type="text/javascript">
$(function(){
  var wait=30;
    function time(obj) {
            if (wait == 0) {
                obj.className='btn btn-success btn-block 222btnCode';
                obj.removeAttribute("disabled");            
                obj.value="コードを再送信";
                wait = 30;
            }  else  {
                obj.className='btn btn-success btn-block 222btnCodeDisabled';
                obj.setAttribute("disabled", true);
                obj.value="再試行("+ wait +")";
                wait--;

                setTimeout(function() {
                    time(obj)
                },
                1000)
            }
            if (wait == 29){
                $.ajax({
                type:"post",
                url:"../test/check2.php",
                data:{iiid1:$('#iiid').val(),ppw1:$('#pppw').val()},
           　　 success:function(data){
                data=$.trim(data);
                if (data.indexOf("再送信を完了しました。")!=-1){
                $('#sd1').text("再送信を完了しました。");
                }else
                $('#sd1').text("再送信を失敗しました、再試行してください。");
                  }
              })
            }
        }
            document.getElementById("denglu2").onclick=function(){time(this);}
   })
</script>
</body>
</html>
  