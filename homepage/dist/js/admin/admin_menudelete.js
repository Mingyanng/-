     $(".deletemenu").click(function(){
                 if(!confirm("本当に削除しますか?")){　
            return;
        }
       var menudeleteform=$(this).parents(".menudeleteform");
        $.ajax({
          type:"post",
            url:"menu/menudelete.php",
            data:
            {
             menudeleteid:menudeleteform.find('.deleteid').val(),

            },
            success:function(data){
               menudeleteform.find('.menudeletealert').html(data);
             
            }
        })

    }) 