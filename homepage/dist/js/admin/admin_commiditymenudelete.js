   var menuadd2;
    $(".menudelete").click(function(){


      menutextform=$(this).parents(".menutextform");
       menuadd2=menutextform.find(".menutr").find("tr:last");
        var arrmid=menuadd2.children()[0].value;
        if (arrmid=='new'){
            menuadd2.remove();
            return;
        }
        if (menutextform.find(".menutr").find("tr").length==1){
            alert('商品ごとに少なくとも1つの属性を必要があります！');
            return;
        }
        if(!confirm("本当に削除しますか?")){　
            return;
        }
     $.ajax({
          type:"post",
            url:"menu/menunaturedelete.php",
            data:{ 
                menunatureid:arrmid
                 },
             success:function(data)
          {

                    data=$.trim(data);
                    if (data=="0"){
   
                    alert('消除成功しました！');location.href='admin.php';
                    }else{
                    alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='admin.php';    
                    }
                    console.log(data);

          }



        });    
    }) 