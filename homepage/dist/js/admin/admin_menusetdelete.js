   $(".menusetdeletebtn").click(function(){
                 if(!confirm("本当に削除しますか?")){　
            return;
        }

       var menusetchangetr=$(this).parents(".menusetchangetr");
        $.ajax({
          type:"post",
            url:"menu/menusetdelete.php",
            data:
            {
             menusetdeleteid:menusetchangetr.find('.changesetid').val(),

            },
            success:function(data){
               menusetchangetr.find('.menusetchangealert').html(data);
           
            }
        })

    }) 