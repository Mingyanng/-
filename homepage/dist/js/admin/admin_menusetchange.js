         var menusetchangeform;

     $('.menusetchangebtn').click(function(){
          //menusetchangeform=$(this).parents(".menusetchangeform");
           menusetchangetr=$(this).parents(".menusetchangetr");

            $.ajax({
              type:"post",
              url:"menu/menusetchange.php",
              data:{

                  menuchangesetid:menusetchangetr.find('.changesetid').val(),
                  menuchangesetname:menusetchangetr.find('.changesetname').val(),
                  menuchangesetname_en:menusetchangetr.find('.changesetname_en').val(),
                  menuchangesetname_zh_HK:menusetchangetr.find('.changesetname_zh_HK').val(),
                  menuchangesetname_zh_CH:menusetchangetr.find('.changesetname_zh_CH').val(),
                  menuchangesetname_ko_KR:menusetchangetr.find('.changesetname_ko_KR').val(),
                  menuchangesetcontent:menusetchangetr.find('.changesetcontent').val(),
                  menuchangesetcontent_en:menusetchangetr.find('.changesetcontent_en').val(),
                  menuchangesetcontent_zh_HK:menusetchangetr.find('.changesetcontent_zh_HK').val(),
                  menuchangesetcontent_zh_CH:menusetchangetr.find('.changesetcontent_zh_CH').val(),
                  menuchangesetcontent_ko_KR:menusetchangetr.find('.changesetcontent_ko_KR').val(),
                  menuchangesetprice:menusetchangetr.find('.changesetprice').val(),
              },
              success:function(data){
                 //console.log(data);
               menusetchangetr.find('.menusetchangealert').html(data);
                //$('#alertalert').html(data);

             }
            });
        })