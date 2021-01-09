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
 
    echo"<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='../admin.php'</script>";
//    echo $_FILES["file"]["error"];    
}
else
{
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
    {
            //防止文件名重复
           $file = $_FILES["file"]["name"];
           $filename1=substr($file, strrpos($file, '.'));
           $name='icon';
           $filename ="../../../dist/img/icon/".time().$_FILES["file"]["name"];
            //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
            $filename =iconv("UTF-8","gb2312",$filename);
             //检查文件或目录是否存在
            
            if(file_exists($filename))
            {
                  echo"<script>alert('ファイルもう存在しました！');location.href='../admin.php'</script>";
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
                $result=$conn->query("select * from icon");
                $conn->exec("UPDATE icon SET location='$filename' WHERE id='1'");
	                echo"<script>alert('更新成功しました！');location.href='../admin.php'</script>";
	                // header("Refresh:3; url=../admin.php");
            }        
    }
    else
    {
        echo"<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='../admin.php'</script>";
       //文件类型不对
    }
}
?>

