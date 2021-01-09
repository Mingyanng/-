<?php
require("connection/connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            body{
                padding-top: 50px; padding-bottom: 45px;
            }
            .col-center-block{
                float: none;
                display: block;
                margin: 0 auto;
            }
            .close{margin-right:8px;}
            .alert{margin-top: auto !important;margin-bottom: auto !important}
            .demo-long {
            margin-top: 100px;
            margin-bottom: 200px;
            }
            .map-container-6{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
            }
            .map-container-6 iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
            }
            .carousel-inner img{
            width: 100%;
            height: 100%;
            }
            .callout-info{
             background-color: #000000 !important;
            }
        </style>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- webpageicon -->
        <link rel="shortcut icon" href="webpageicon/111.ico">
        <link rel="Bookmark" href="webpageicon/111.ico">
        <!-- /webpageicon -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">	
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--> 
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!--twitter-->
        <link rel="stylesheet" href="https://abs.twimg.com/a/1541805137/css/t1/twitter_core.bundle.css">
        <link href="../../dist/css/b-bbootstrap.min.css" rel="stylesheet" />
        <title>肉のサカタ</title>
    </head>


    <body>

        <!-- alert -->

        <?php
            $result=$conn->query("select * from alert");                 
        ?>
        <?php
            foreach ($result as $r){
        ?>

        <div class=" alert alert-danger alerthide<?php echo($r["hide"]);?>" display="" style="word-break:break-all; word-wrap:break-all;" >
            <a class="close" data-dismiss="alert">
                &times;
            </a>
            <?php
                $result=$conn->query("select * from alert where hide=0");
            ?>
            <?php
                foreach ($result as $r){
            ?>
            <?php echo($r["alerttext"])?>
            <?php  
                }
            ?>
        </div>
            <?php  
                }       
            ?>

        <!-- /alert -->

        <!-- navigation -->

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#FFFFFF; ">
          <div class="container-fluid"> 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_ko_KR.php">肉のサカタ</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse" data-toggle="collapse" data-target="#example-navbar-collapse">
                <ul class="nav navbar-nav nav-stacked">
                    <li><a href="#owner">매장소개</a></li>
                    <li><a href="#menu">메뉴</a></li>
                    <li><a href="#map">주소</a></li>
                    <li class="dropdown">
                    <a href="#" data-toggle="dropdown">언어</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">日本語</a></li>
                            <li><a href="index_en.php">English</a></li>
                            <li><a href="index_zh_HK.php">繁體中文</a></li>
                            <li><a href="index_zh_CH.php">简体中文</a></li> 
                        </ul>
                    </li>
                </ul>
            </div>
          </div>
        </nav>

        <!-- /navigation -->

        <section class="content">
            <div class="col-md-10 col-md-offset-1">

                <!-- carousel -->

                <div class="box box-solid" id="" >
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="" class="active"></li>
                             <?php
                                $result=$conn->query("select * from menu");
                             ?>
                             <?php
                                foreach ($result as $r){
                             ?>
                            <li data-target="#carousel-example-generic" data-slide-to="" class=""></li>
                             <?php  
                                }
                             ?>               
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                              <a href="#owner">
                                  <img src="../../dist/img/menu/156248374712342.jpg" alt="First slide">
                              </a>
                            </div>
                            <?php
                                $result=$conn->query("select * from menu");
                            ?>
                            <?php
                                foreach ($result as $r){
                            ?>	                
                            <div class="item">
                                <a href="#menu">  
                                    <img src="<?php echo substr(($r["menulocation"]),3)?>" alt="Second slide">
                                </a>
                                <div class="carousel-caption">
                                    <h3><?php echo ($r["name_ko_KR"])?></h3>
                                </div>
                            </div>                   
                            <?php  
                                }
                             ?>                  
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                      </div>
                </div>
                <!-- /carousel -->
                <!--icon-->
                <div class="box box-solid">
                    <div class="box-body no-padding" >
                        <div class="mailbox-read-message">             
                            <div class="row margin-bottom">
                                <br>
                                <br>                   
                                <div class="col-md-4 col-sm-4 col-xs-12" id="owner">
                                     <?php
                                        $result=$conn->query("select * from icon");
                                     ?>
                                     <?php
                                        foreach ($result as $r){
                                     ?>

                                        <img class="img-responsive center-block" src="<?php echo substr(($r["location"]),3)?>"alt="Photo" style="height: 230px;width: 230px"/>

                                     <?php  
                                         }
                                     ?>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12" style="word-break:break-all;word-wrap:break-all; ">                     
                                    <h1>
                                    <?php
                                        $result=$conn->query("select * from icontext");				              
                                        foreach ($result as $r){				            
                                        echo ($r["ititle"]);				               
                                        }
                                    ?>
                                    </h1>
                                    <div style="white-space:pre-line">   
                                        <?php
                                            $result=$conn->query("select * from icontext");				                 				              
                                            foreach ($result as $r){
                                            echo ($r["itext_ko_KR"]);				               
                                            }
                                        ?>
                                    </div>				              
                                </div>                    
                            </div>
                        </div>    
                    </div>
                </div>

                <!--menu-->

                <div class="box box-solid">
                    <div class="box-header">   
                        <h1>메뉴</h1>
                    </div>   
                    <div class="box-body" id="menu" style="word-break:break-all;word-wrap:break-all; ">
                        <?php
                            $result=$conn->query("select * from menu");
                        ?>
                        <?php
                            foreach ($result as $r){
                        ?>        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-10">
                            <div class="box box-solid limit-p-width ">
                                <div class="box-body affiliate well" style="background-color:#ffffff;">
                                    <a href="">
                                        <img src="<?php echo substr(($r["menulocation"]),3)?>" alt="" class="img-responsive">
                                    </a>
                                    <div class="caption">
                                        <h3><?php echo($r["name_ko_KR"]);?></h3>
                                        <?php
                                            $result2=$conn->query("select menunature.size_ko_KR,menunature.price from menu inner join menunature on menu.commodityid = menunature.commodityid1 where menu.commodityid=".$r["commodityid"]);                       
                                        ?> 
                                        <?php
                                            foreach ($result2 as $r2){                      
                                        ?>
                                        <h4><?php echo($r2["size_ko_KR"]);?>:<?php echo($r2["price"]);?>일본 엔</h4> 
                                        <?php
                                            }   
                                        ?>
                                        <p><?php echo($r["other_ko_KR"]);?></p>
                                    </div>
                                </div>
                            </div>                    
                        </div>          
                        <?php
                        }
                        ?>
                    </div>
                    <div class="container">
                        <h1>세트</h1>
                        <?php
                            $result=$conn->query("select * from menuset");
                        ?>

                        <?php
                            foreach ($result as $r){
                        ?> 
                      <blockquote class="blockquote">
                            <p><?php echo($r["name_ko_KR"]);?>:<?php echo($r["menucompose_ko_KR"]);?>:<?php echo($r["price"]);?>일본 엔</p>
                        <?php
                          }   
                        ?>
                      </blockquote>
                    </div>
                </div>

                <!--/menu-->
                <!--map-->

                <div class="box box-solid">             
                    <div class="box-body" id="map" style="word-break:break-all;word-wrap:break-all; ">
                        <div id="map" class="col-lg-5 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-header blue accent-1">
                                        <h3>영업시간</h3>
                                    </div>
                                    <br>
                                    <p>
                                        아침：１１：３０〜１４：３０<br>
                                        밤：１８：３０〜２４：００<br>
                                        <br>
                                        일요일　정기 휴일
                                    </p>
                                    <br>
                                    <div class="form-header blue accent-1">
                                        <h3>주소</h3>
                                    </div>
                                    <br>
                                    <p><i class="fa fa-map-marker"></i> 〒603-8146 京都府京都市北区新御霊口町２６９−２</p>
                                    <p><i class="fa fa-comment"></i><a href=""> xxxxxxxx.com</a></p>
                                    <p><i class="fa fa-phone"></i> 075-231-0866</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26134.01603518478!2d135.74493256318883!3d35.037933524779824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x590899ea98822fbd!2z6IKJ44Gu44K144Kr44K_!5e0!3m2!1sja!2sjp!4v1560432128505!5m2!1sja!2sjp"
                                  frameborder="0" style="border:0" allowfullscreen>
                                </iframe>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

                <!--/map-->

            </div>
        </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../../bower_components/navdesign/jquery.bootstrap-autohidingnavbar.js"></script>
    <script src="../../dist/js/index/user_twitter.js"></script>
    <script src="../../dist/js/index/user_nav.js"></script>
    <script src="../../dist/js/index/user_alert.js"></script>
    <script src="../../dist/js/index/user_menuheight.js"></script> 
</html>
