<?php
require("../connection/connect.php");
?>
<?php
//var_dump($_FILES["file"]);
//array(5) { ["name"]=> string(17) "56e79ea2e1418.jpg" ["type"]=> string(10) "image/jpeg" ["tmp_name"]=> string(43) "C:\Users\asus\AppData\Local\Temp\phpD07.tmp" ["error"]=> int(0) ["size"]=> int(454445) } 
//1.限制文件的类型，防止注入php或其他文件，提升安全
//2.限制文件的大小，减少内存压力
//3.防止文件名重复，提升用户体验
    //方法一：  修改文件名    一般为:时间戳+随机数+用户名
    // 方法二:建文件夹
    
//4.保存文件

//判断上传的文件是否出错,是的话，返回错误

if($_FILES["file"]["error"])
{
//    echo $_FILES["file"]["error"];    
echo"<script>alert('ファイル選択してください！');location.href='../admin.php'</script>";    
}else{
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过1024000B
    
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
    {
            //防止文件名重复
           $file = $_FILES["file"]["name"];
           $filename1=substr($file, strrpos($file, '.'));
           $name='menu';
           $filename ="../../../dist/img/menu/".time().$_FILES["file"]["name"];
            //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
            $filename =iconv("UTF-8","gb2312",$filename);
             //检查文件或目录是否存在
        
        
            

        
            if(file_exists($filename))
            {
                  echo"ファイルもう存在しました";
                  //已存在该文件
                //  move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
                //   $result=$conn->query("select * from icon");
                // $conn->exec("UPDATE icon SET location='$filename' WHERE id='1'");
	               //  echo"アップロード成功しました、3秒後に管理画面へジャンプします。";
	               //   header("Refresh:3; url=../admin.php");
            }
            else
            {  
                //保存文件,   move_uploaded_file 将上传的文件移动到新位置
             
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址
            $size = getimagesize ($filename);
            $width = $size[0];
            $height = $size[1];
            if(!(1366<=$width&&$width<=1920||768<=$height&&$height<=1080)){
            echo "<script>alert('画像のサイズを確認してください！');location.href='../admin.php'</script>";
            unlink($filename);    
            exit;
            }
                $result=$conn->query("select * from menu");
                $id=$_POST['picturecommodityid'];
                if ($id=="new"){ 
                    $idt=$conn->query("SELECT max(commodityid) as id from  menu;");
                    foreach ($idt as $r){
                            $id=($r["id"]);
                    }
                }
                
                $conn->query("UPDATE menu SET menulocation='".$filename."' WHERE commodityid='".$id."'");
                echo"<script>alert('追加成功しました！');location.href='../admin.php'</script>";
//	                echo"アップロード成功しました、3秒後に管理画面へジャンプします。";
//	                header("Refresh:3; url=../admin.php");
            }        
    }
    else
    {
        echo"<script>alert('ファイルの種類に誤りがあります、再度ご確認の上アップロードしてください！');location.href='../admin.php'</script>";
       //文件类型不对
    }
}
?>

