<?php
    session_start();
    include 'connection/connect.php';   
    if (empty($_SESSION['name'])){
     @header("LOCATION:sign-in/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- webpageicon -->
        <link rel="Bookmark" href="webpageicon/111.ico">
        <link rel="shortcut icon" href="webpageicon/111.ico">        
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
        <link rel="stylesheet" href="../../Font-Awesome-3.2.1/css/font-awesome.min.css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
        <![endif]-->    
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../../bower_components/navdesign/jquery.bootstrap-autohidingnavbar.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://unpkg.com/bootstrap-switch"></script>
        <!-- <script src="js/main.js"></script> -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style type="text/css">
            body{
            padding-top: 45px; 
            }

            .mt-10{margin-top:10px;
            }

            th{
            text-align: center;
            }

            .picturefile{
            position: absolute;
            overflow: hidden;
            right: 0;
            top: 0;
            opacity: 0;
            }
        </style>
        <title>肉のサカタ管理システム</title>
    </head>
    <body>

        <!-- nav -->

        <div id="res"></div>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#FFFFFF;">
          <div class="container-fluid"> 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">肉のサカタ管理システム</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse" data-toggle="collapse" data-target="#example-navbar-collapse">
                <ul class="nav navbar-nav nav-stacked">

                    <li><a href="#owner" >店舗紹介</a></li>
                    <li><a href="#menu" >メニュー</a></li>
                    <li><a href="#set">セット</a></li>
                    <li><a href="javascript:void(0);"  onclick="return logout();">ログアウト</a></li> 
                </ul>
            </div>
          </div>
        </nav>

        <!-- /nav -->

        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- times -->

                    <div class=" box-solid box-danger">
                        <div class="box-header with-border">
                            <?php
                                $result=$conn->query("select * from users");
                            ?>
                            <?php
                                foreach ($result as $r){
                            ?>
                            <h3 class="box-title">ログイン回数 : <?php echo($r["adminlogintimes"]);?> 回 前回ログイン日時 : <?php echo($r["lastlogintime"]);?> ホームページの訪問数： <?php echo($r["userlogintimes"]);?> 回</h3>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                    <!-- /times -->

                    <!-- alert -->

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">アラート</h3>
                            <hr/>
                            <?php
                                $result=$conn->query("select * from alert");
                            ?>
                            <?php
                                foreach ($result as $r){
                            ?>
                            <div class="liexiaoshi">
                                <div style="float:left;">アラート(50文字以内)</div>
                                <div class="switch"  id="mySwitch" style="float:right;"  data-on="warning" data-off="danger" >
                                    <input class="kanbujian hidevalue<?php echo($r["hide"]);?>" type="checkbox" name="my-checkbox" checked />
                                </div>
                                <input type="hidden"  class="commodityhide" value="<?php echo($r["hide"]);?>">
                            </div>
                            <?php  
                                }
                            ?>
                        </div>
                        <div class="box-body">
                            <form role="form" action="alert/alerttext.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">              
                                    <?php
                                        $result=$conn->query("select * from alert");
                                    ?>
                                    <?php
                                        foreach ($result as $r){
                                    ?>
                                    <input type="text" name="alert" id="alert1" class="form-control" value="<?php echo ($r["alerttext"]);?>"/>
                                    <?php  
                                        }
                                    ?>
                                </div>     
                                <div class="form-group" id="alertalert">
                                </div>
                            </form>
                        </div>
                        <div class="box-footer">
                            <input id="alertbutton" type="button" value="送信" class="btn btn-danger"/>                        
                        </div>   
                    </div>

                    <!-- /alert --> 

                    <!-- icon -->

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">アイコン</h3>
                        </div>

                        <!-- iconimg -->

                        <form role="form" action="icon/iconpicturedatebaseupload.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row margin-bottom">
                                        <div class="col-sm-3">
                                            <label for="exampleInputFile">画像を選択</label>
                                            <input type="file" id="exampleInputFile" type="file" name="file" class="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');">
                                        </div>                 
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-6">
                                                    <div id="divPreview">
                                                        <?php
                                                            $result=$conn->query("select * from icon");
                                                        ?>
                                                        <?php
                                                            foreach ($result as $r){
                                                        ?>
                                                        <img id="imgHeadPhoto"  src="<?php echo substr(($r["location"]),3)?>" style="width: 170px; height: 170px; border: solid 1px #d2e2e2;"
                                                          alt="" />
                                                        <?php  
                                                            }
                                                        ?>                                                     
                                                    </div>                   
                                                </div>
                                            </div>
                                        </div>                    
                                    </div>         
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-warning">送信</button>
                            </div>                        
                        </form>

                        <!-- /iconimg -->

                        <!-- icontext -->

                        <hr>
                        <form role="form" action="icon/icontext.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>タイトル(25文字以内)</label>
                                    <?php
                                        $result=$conn->query("select * from icontext");
                                    ?>
                                    <?php
                                        foreach ($result as $r){
                                    ?>
                                    <input type="text" name="ititle1" id="ititle1a" class="form-control" value="<?php echo ($r["ititle"]);?>"/>
                                    <?php  
                                        }
                                    ?> 
                                </div>
                                <div class="form-group">
                                    <label>内容(250文字以内)</label>
                                    <br>
                                    <?php
                                        $result=$conn->query("select * from icontext where id=1");
                                    ?>
                                    <?php
                                        foreach ($result as $r){
                                    ?>
                                    <div class="form-group">
                                        <label for="name">日本語</label>
                                        <textarea class="form-control" name="itext1" id="itext1a" rows="3"><?php echo ($r["itext"]);?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">英語</label>
                                        <textarea class="form-control" name="itext1_en" id="itext1a_en" rows="3"><?php echo ($r["itext_en"]);?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">繁体字</label>
                                        <textarea class="form-control" name="itext1_zh_HK" id="itext1a_zh_HK" rows="3"><?php echo ($r["itext_zh_HK"]);?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">簡体字</label>
                                        <textarea class="form-control" name="itext1_zh_CH" id="itext1a_zh_CH" rows="3"><?php echo ($r["itext_zh_CH"]);?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">韓国語</label>
                                        <textarea class="form-control" name="itext1_ko_KR" id="itext1a_ko_KR" rows="3"><?php echo ($r["itext_ko_KR"]);?></textarea>
                                    </div>
                                    <?php  
                                        }
                                    ?> 
                                </div>
                                <div class="form-group" id="iconalert2">

                                </div>              
                            <div class="box-footer"  id="menu">
                             <!-- <button type="submit"　id="denglu" class="btn btn-primary">Submit</button> -->
                             <input id="icon2" type="button" value="送信" class="btn btn-warning" >
                            </div> 
                            </div>
                        </form>

                        <!-- /icontext -->
                    </div>

                    <!-- /icon -->
                   
                    <!-- menu -->

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">メニュー</h3>
                        </div>
                        <div class="box-body no-padding"  style="word-break:break-all;word-wrap:break-all; well">
                            <div class="col-lg-6 col-md-offset-3">
                                <div class="input-group menusearch">
                                    <input type="text" class="form-control menusearchinput">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default menusearchbtn" type="button">
                                            検査
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div id = "menusearchresult">
                                <?php
                                      
                                    if(empty($_GET['search'])){
                                        $result=$conn->query("SELECT * FROM menu ORDER BY commodityid");
                                    }else{
                                        $result=$conn->query("SELECT * FROM menu
                                        WHERE name LIKE '%".$_GET['search']."%'
                                        OR 	name_en LIKE '%".$_GET['search']."%'
                                        OR 	name_zh_HK LIKE '%".$_GET['search']."%'
                                        OR 	name_zh_CH LIKE '%".$_GET['search']."%'
                                        OR name_ko_KR LIKE '%".$_GET['search']."%'
                                        OR other LIKE '%".$_GET['search']."%'
                                        OR other_en LIKE '%".$_GET['search']."%'
                                        OR other_zh_HK LIKE '%".$_GET['search']."%'
                                        OR other_zh_CH LIKE '%".$_GET['search']."%'
                                        OR other_ko_KR LIKE '%".$_GET['search']."%'
                                        ");
                                    }
                                    $picc=0;
                                ?>
                            </div>                      
                            <?php
                                foreach ($result as $r){      
                                $picc=$picc+1;
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 mt-10 " id="here">

                                <!-- menudelete -->

                                <form role="form" class="menudeleteform" action="menu/menudelete.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="deletecommodityid" class="form-control deleteid"  value="<?php echo($r["commodityid"]);?>"/>               
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-box-tool deletemenu" ><i class="fa fa-times"></i></button>
                                        <p class="menudeletealert"></p>
                                    </div> 
                                </form>

                                <!-- /menudelete -->
                                <div class="mailbox-attachment-info well">

                                    <!-- menuimg -->

                                    <form role="form" action="menu/menupicturedatebaseupload.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group" >
                                            <div class="row margin-bottom" >
                                                <div class="col-sm-12">
                                                    <h5 class="text-center"><strong>画像</strong></h5>     
                                                    <hr>                          
                                                </div>                  
                                                <div class="col-sm-12" >
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-6">
                                                            <input type="hidden" name="picturecommodityid" class="form-control commodityid"  value="<?php echo($r["commodityid"]);?>"/>
                                                            <center>
                                                                <div id="divPreviewmenupicture" class=" commodityid">
                                                                    <span class="mailbox-attachment-icon has-img commodityid">
                                                                        <label>
                                                                            <img id="imgHeadPhotomenupicture<?php echo $picc; ?>" class="commodityid" src="<?php echo substr(($r["menulocation"]),3)?>" style="width: 170px; height: 170px; border: solid 1px #d2e2e2;"
                                                                            alt="" />
                                                                            <input type="file" id="exampleInputFile" type="file" name="file" class="file " onchange="PreviewImage(this,'imgHeadPhotomenupicture<?php echo $picc; ?>','divPreviewmenupicture');" style="display:none" >
                                                                        </label>
                                                                        <h6>上記の画像をクリックしてファイルを選択してください(1920x1080px~1366x768px)。</h6>   
                                                                    </span>                                                   
                                                                </div> 
                                                            </center>    
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div>
                                        </div>
                                        <center><button type="submit" class="btn btn-success">送信</button></center>                                    
                                    </form>

                                    <!-- /menuimg -->

                                    <!-- menutext -->

                                    <br>    
                                    <form role="form" class="menutextform" action="menu/menuupdate.php" method="post" enctype="multipart/form-data">
                                        <table class="table table-striped table-hover ">
                                            <input type="hidden" class="form-control menuid1"  value="<?php echo($r["commodityid"]);?>"/>
                                            <thead>
                                                <tr>
                                                    <th>商品名</th>                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">日本語</span>
                                                            <input type="text"   class="form-control menuname1"value="<?php echo($r["name"]);?>"/>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">英語</span>
                                                            <input type="text"   class="form-control menuname1_en"value="<?php echo($r["name_en"]);?>"/>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">繁体字</span>
                                                            <input type="text"   class="form-control menuname1_zh_HK"value="<?php echo($r["name_zh_HK"]);?>"/>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">簡体字</span>
                                                            <input type="text"   class="form-control menuname1_zh_CH"value="<?php echo($r["name_zh_CH"]);?>"/>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">韓国語</span>
                                                            <input type="text"   class="form-control menuname1_ko_KR"value="<?php echo($r["name_ko_KR"]);?>"/>
                                                        </div>
                                                    </td>
                                                </tr>                      
                                            </tbody>
                                      </table>
                                      <?php
                                        $result2=$conn->query("select menunature.natureid,menunature.size,menunature.size_en,menunature.size_zh_HK,menunature.size_zh_CH,menunature.size_ko_KR,menunature.price from menu inner join menunature on menu.commodityid = menunature.commodityid1 where menu.commodityid=".$r["commodityid"]);
                                      ?> 
                                      <table class="table table-striped table-hover" id="LearnInfoItem">
                                          <thead>
                                              <tr>
                                                  <th>サイズ</th>
                                                  <th>価格</th>                         
                                              </tr>
                                          </thead>
                                          <tbody class="menutr">
                                              <?php
                                                foreach ($result2 as $r2){                      
                                              ?>
                                              <tr id="tr1">
                                                <input type="hidden"  id="menunatureid1"  class="form-control menunatureid1"  value="<?php echo($r2["natureid"]);?>"/>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">日本語</span>
                                                        <input type="text"   class="form-control menusize1"value="<?php echo($r2["size"]);?>"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">英語</span>
                                                        <input type="text"   class="form-control menusize1_en"value="<?php echo($r2["size_en"]);?>"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">繁体字</span>
                                                        <input type="text"   class="form-control menusize1_zh_HK"value="<?php echo($r2["size_zh_HK"]);?>"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">簡体字</span>
                                                        <input type="text"   class="form-control menusize1_zh_CH"value="<?php echo($r2["size_zh_CH"]);?>"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">韓国語</span>
                                                        <input type="text"   id="menusize1" class="form-control menusize1_ko_KR" value="<?php echo($r2["size_ko_KR"]);?>"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" id="menuprice1"  class="form-control menuprice1" value="<?php echo($r2["price"]);?>" oninput = "value=value.replace(/[^\d]/g,'')"/>
                                                </td>                          
                                              </tr>
                                              <?php
                                                }   
                                              ?> 
                                          </tbody>
                                      </table>
                                      <center>
                                        <div class="tdStyle2"> 
                                            <input type="button" id="menudelete"   class="btn btn-danger menudelete" value="削除"/>
                                            <input type="button" id="menuadd"   class="btn btn-success menuadd" value="添加"/>          
                                        </div>
                                      </center>
                                      <table class="table table-striped table-hover">
                                          <thead>
                                              <tr>
                                                  <th>紹介</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                  <div class="form-group">
                                                     <label for="name">日本語</label>
                                                     <textarea class="form-control menuother1"   id="menuother1" rows="3"><?php echo($r["other"]);?></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="name">英語</label>
                                                     <textarea class="form-control menuother1_en"   id="menuother1" rows="3"><?php echo($r["other_en"]);?></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="name">繁体字</label>
                                                     <textarea class="form-control menuother1_zh_HK"   id="menuother1" rows="3"><?php echo($r["other_zh_HK"]);?></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="name">簡体字</label>
                                                     <textarea class="form-control menuother1_zh_CH"   id="menuother1" rows="3"><?php echo($r["other_zh_CH"]);?></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="name">韓国語</label>
                                                     <textarea class="form-control menuother1_ko_KR"   id="menuother1" rows="3"><?php echo($r["other_ko_KR"]);?></textarea>
                                                  </div>
                                              </td>                                                 
                                            </tr>                      
                                          </tbody>
                                      </table> 
                                      <p class="text-center menutextalert"></p>
                                     <br>
                                     <center><button id="menutext" name="menutext" type="button"  class="btn btn-success menutext">送信</button></center>
                                </form>

                                    <!-- /menutext -->

                                </div>
                            </div>
                            <?php
                                }   
                            ?>

                            <!-- newmenu -->

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-10">
                                <center>                      
                                    <br>
                                    <button class="btn btn-success " data-toggle="modal" data-target="#myModal">
                                        <i class="icon-plus-sign icon-2x" >新商品作成</i>
                                    </button>
                                </center>
                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                新商品作成
                                            </h4>
                                        </div>
                                        <form role="form" class="newmenuinssert" action="menu/menupicturedatebaseupload.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group" >
                                                    <div class="row margin-bottom" >
                                                        <div class="col-sm-12" >
                                                            <h5 class="text-center"><strong>画像</strong></h5>                        
                                                            <hr>                          
                                                        </div>                                    
                                                        <div class="col-sm-12" >
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-6">
                                                                    <input type="hidden" name="picturecommodityid" class="form-control commodityid"  value="new"/>
                                                                    <center>
                                                                        <div id="divPreviewmenupicture" class=" commodityid">
                                                                            <span class="mailbox-attachment-icon has-img commodityid">
                                                                                <label>
                                                                                    <img id="imgHeadPhotomenupicture" class="commodityid icon-picture icon-2x" src="" style="width: 170px; height: 170px; border: solid 1px #d2e2e2;"
                                                                                    alt="" />
                                                                                    <input type="file" id="exampleInputFile1" type="file" name="file" class="file " onchange="PreviewImage(this,'imgHeadPhotomenupicture','divPreviewmenupicture');" style="display:none" />
                                                                                </label>
                                                                                <h6>上記の画像をクリックしてファイルを選択してください(1920x1080px~1366x768px)。</h6>   
                                                                            </span>                                                   
                                                                        </div> 
                                                                    </center>
                                                                </div>
                                                          </div>
                                                        </div>                    
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                          <th>商品名</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">日本語</span>
                                                                    <input type="text"   class="form-control newmenuname1" placeholder="日本語の商品名を入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">英語</span>
                                                                    <input type="text"   class="form-control newmenuname1_en" placeholder="英語の商品名を入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">繁体字</span>
                                                                    <input type="text"   class="form-control newmenuname1_zh_HK" placeholder="繁体字の商品名を入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">簡体字</span>
                                                                    <input type="text"   class="form-control newmenuname1_zh_CH" placeholder="簡体字の商品名を入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">韓国語</span>
                                                                    <input type="text"   class="form-control newmenuname1_ko_KR" placeholder="韓国語の商品名を入力してください"/>
                                                                </div>
                                                            </td>
                                                        </tr>                      
                                                    </tbody>
                                                </table>
                                                <table class="table table-striped table-hover" id="LearnInfoItem">
                                                    <thead>
                                                        <tr>
                                                            <th>サイズ</th>
                                                            <th>価格</th>                         
                                                        </tr>
                                                    </thead>
                                                    <tbody class="newmenutr">
                                                        <tr id="tr2">
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">日本語</span>
                                                                    <input type="text"   id="newmenusize1" class="form-control newmenusize1" placeholder="日本語のサイズを入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">英語</span>
                                                                    <input type="text"   id="newmenusize1" class="form-control newmenusize1_en" placeholder="英語のサイズを入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">繁体字</span>
                                                                    <input type="text"   id="newmenusize1" class="form-control newmenusize1_zh_HK" placeholder="繁体字のサイズを入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">簡体字</span>
                                                                    <input type="text"   id="newmenusize1" class="form-control newmenusize1_zh_CH" placeholder="簡体字のサイズを入力してください"/>
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">韓国語</span>
                                                                    <input type="text"   id="newmenusize1" class="form-control newmenusize1_ko_KR" placeholder="韓国語のサイズを入力してください"/>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="newmenuprice1"  class="form-control newmenuprice1" placeholder="価格を入力してください" oninput = "value=value.replace(/[^\d]/g,'')"/>
                                                            </td>                          
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <center>
                                                    <div class="tdStyle3"> 
                                                        <input type="button" id=""   class="btn btn-danger newmenudelete" value="削除"/>
                                                        <input type="button" id=""   class="btn btn-success newmenuadd" value="添加"/>
                                                    </div>
                                                </center>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>紹介</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="name">日本語</label>
                                                                    <textarea class="form-control newmenuother1"   id="menuother1" rows="3" placeholder="日本語の紹介を入力してください"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">英語</label>
                                                                    <textarea class="form-control newmenuother1_en"   id="menuother1" rows="3" placeholder="英語の紹介を入力してください"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">繁体字</label>
                                                                    <textarea class="form-control newmenuother1_zh_HK"   id="menuother1" rows="3" placeholder="繁体字の紹介を入力してください"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">簡体字</label>
                                                                    <textarea class="form-control newmenuother1_zh_CH"   id="menuother1" rows="3" placeholder="簡体字の紹介を入力してください"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">韓国語</label>
                                                                    <textarea class="form-control newmenuother1_ko_KR"   id="menuother1" rows="3" placeholder="韓国語の紹介を入力してください"></textarea>
                                                                </div>
                                                            </td>                                                 
                                                        </tr>                      
                                                    </tbody>
                                                </table> 
                                                <p class="text-center newmenutextalert"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default " data-dismiss="modal">キャンセル
                                                </button>
                                                <button type="button" class="btn btn-success newmenubutton">
                                                    追加
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 

                            <!-- /newmenu -->

                        </div>
                    </div> 

                    <!--/menu--> 

                    <!--set-->

                    <div class="box box-info" id="set">
                        <div class="box-header with-border">
                            <h3 class="box-title">セット</h3>
                        </div>
                        <div class="box-body no-padding"  style="word-break:break-all;word-wrap:break-all;">
                            <table class="table table-striped table-hover menusetchange">
                                <thead>
                                    <tr>
                                        <th>セット名</th>
                                        <th>内容</th>
                                        <th>価格</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=$conn->query("select * from menuset");
                                    ?>
                                    <?php
                                    foreach ($result as $r){
                                    ?> 
                                    <tr class="menusetchangetr">
                                        <input type="hidden"   class="form-control changesetid" value="<?php echo($r["menusetid"]);?>">
                                        <td>
                                            <div class="input-group">
                                                 <span class="input-group-addon">日本語</span>
                                                 <input type="text"   class="form-control changesetname" value="<?php echo($r["name"]);?>"/>
                                            </div>
                                            <div class="input-group">
                                                 <span class="input-group-addon">英語</span>
                                                 <input type="text"   class="form-control changesetname_en" value="<?php echo($r["name_en"]);?>"/>
                                            </div>
                                            <div class="input-group">
                                                 <span class="input-group-addon">繁体字</span>
                                                 <input type="text"   class="form-control changesetname_zh_HK" value="<?php echo($r["name_zh_HK"]);?>"/>
                                            </div>
                                             <div class="input-group">
                                                 <span class="input-group-addon">簡体字</span>
                                                 <input type="text"   class="form-control changesetname_zh_CH" value="<?php echo($r["name_zh_CH"]);?>"/>
                                            </div>
                                            <div class="input-group">
                                                 <span class="input-group-addon">韓国語</span>
                                                 <input type="text"   class="form-control changesetname_ko_KR" value="<?php echo($r["name_ko_KR"]);?>"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon">日本語</span>
                                                 <input type="text"    class="form-control changesetcontent" value="<?php echo($r["menucompose"]);?>"/>
                                            </div>
                                            <div class="input-group">
                                                 <span class="input-group-addon">英語</span>
                                                 <input type="text"   class="form-control changesetcontent_en" value="<?php echo($r["menucompose_en"]);?>"/>
                                            </div>
                                            <div class="input-group">
                                                 <span class="input-group-addon">繁体字</span>
                                                 <input type="text"   class="form-control changesetcontent_zh_HK" value="<?php echo($r["menucompose_zh_HK"]);?>"/>
                                            </div>
                                             <div class="input-group">
                                                 <span class="input-group-addon">簡体字</span>
                                                 <input type="text"   class="form-control changesetcontent_zh_CH" value="<?php echo($r["menucompose_zh_CH"]);?>"/>
                                            </div>
                                            <div class="input-group">
                                                 <span class="input-group-addon">韓国語</span>
                                                 <input type="text"   class="form-control changesetcontent_ko_KR" value="<?php echo($r["menucompose_ko_KR"]);?>"/>
                                            </div>
                                        </td>
                                        <td>
                                          <input type="text"   class="form-control changesetprice" value="<?php echo($r["price"]);?>" oninput = "value=value.replace(/[^\d]/g,'')"/>
                                          <p class="text-center menusetchangealert"></p> 
                                        </td>
                                        <td>	
                                            <button  type="submit" class="btn btn-danger menusetdeletebtn">
                                                消除
                                            </button>
                                            <button  type="button" id="menusetchangebtn" class="btn btn-info menusetchangebtn">変更
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                        }   
                                    ?>
                                </tbody>
                            </table>
                            <div class="col-md-12" >
                                <center>                      
                                    <button class="btn btn-info " data-toggle="modal" data-target="#myModalset">
                                         <i class="icon-plus-sign icon-2x" >新セット作成</i>
                                    </button>
                                </center>
                            </div>
                            <div class="modal fade" id="myModalset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form role="form" class="menunewsetform" action="menu/menuset.php" method="post" enctype="multipart/form-data">         
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">新セット作成</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">セット名</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">日本語</span>
                                                        <input type="text" class="form-control newsetname" id="newsetname" placeholder="日本語のセット名を入力してください"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">英語</span>
                                                        <input type="text" class="form-control newsetname_en" id="newsetname" placeholder="英語のセット名を入力してください"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">繁体字</span>
                                                        <input type="text" class="form-control newsetname_zh_HK" id="newsetname" placeholder="繁体字のセット名を入力してください"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">簡体字</span>
                                                        <input type="text" class="form-control newsetname_zh_CH" id="newsetname" placeholder="簡体字のセット名を入力してください"/>
                                                    </div>
                                                     <div class="input-group">
                                                        <span class="input-group-addon">韓国語</span>
                                                        <input type="text" class="form-control newsetname_ko_KR" id="newsetname" placeholder="韓国語のセット名を入力してください"/>
                                                    </div>
                                                    <label for="content">内容</label>            
                                                     <div class="input-group">
                                                        <span class="input-group-addon">日本語</span>
                                                        <input type="text" class="form-control newsetcontent" id="newsetcontent" placeholder="日本語の内容を入力してください"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">英語</span>
                                                        <input type="text" class="form-control newsetcontent_en" id="newsetcontent" placeholder="英語の内容を入力してください"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">繁体字</span>
                                                        <input type="text" class="form-control newsetcontent_zh_HK" id="newsetcontent" placeholder="繁体字の内容を入力してください"/>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">簡体字</span>
                                                        <input type="text" class="form-control newsetcontent_zh_CH" id="newsetcontent" placeholder="簡体字の内容を入力してください"/>
                                                    </div>
                                                     <div class="input-group">
                                                        <span class="input-group-addon">韓国語</span>
                                                        <input type="text" class="form-control newsetcontent_ko_KR" id="newsetcontent" placeholder="韓国語の内容を入力してください"/>
                                                    </div>
                                                    <label for="price">価格</label>
                                                    <input type="text" class="form-control newsetprice" id="newsetprice" placeholder="価格を入力してください" oninput = "value=value.replace(/[^\d]/g,'')"/>
                                                </div>                           
                                            </div>
                                            <p class="text-center menunewsetalert"></p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                                <button type="button" class="btn btn-info newsetbutton">追加</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 

               <!--/set-->

                </div>
            </div>
        </section>  
    </body>

    <script src="../../dist/js/admin/admin_iconpictureupload.js"></script>
    <script src="../../dist/js/admin/admin_logintimecontrol.js"></script>
    <script src="../../dist/js/admin/admin_logout.js"></script>
    <script src="../../dist/js/admin/admin_nav.js"></script>
    <script src="../../dist/js/admin/admin_icontextpost.js"></script>
    <script src="../../dist/js/admin/admin_alertswitch.js"></script>
    <script src="../../dist/js/admin/admin_alerthidden.js"></script>
    <script src="../../dist/js/admin/admin_menusearch.js"></script>
    <script src="../../dist/js/admin/admin_menutext.js"></script>
    <script src="../../dist/js/admin/admin_menuadd.js"></script>
    <script src="../../dist/js/admin/admin_newmenuadd.js"></script>
    <script src="../../dist/js/admin/admin_newmenudelete.js"></script>
    <script src="../../dist/js/admin/admin_newmenupost.js"></script>
    <script src="../../dist/js/admin/admin_commiditymenudelete.js"></script>
    <script src="../../dist/js/admin/admin_menudelete.js"></script>
    <script src="../../dist/js/admin/admin_newmenusetpost.js"></script>
    <script src="../../dist/js/admin/admin_menusetchange.js"></script>
    <script src="../../dist/js/admin/admin_menuhighcontrol.js"></script>
    <script src="../../dist/js/admin/admin_menusetdelete.js"></script>
</html>
