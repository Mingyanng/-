 $('.newsetbutton').click(function(){
          var menunewsetform=$(this).parents(".menunewsetform");
            $.ajax({
              type:"post",
              url:"menu/menuset.php",
              data:{
                  menunewsetname:menunewsetform.find('.newsetname').val(),
                  menunewsetname_en:menunewsetform.find('.newsetname_en').val(),
                  menunewsetname_zh_HK:menunewsetform.find('.newsetname_zh_HK').val(),
                  menunewsetname_zh_CH:menunewsetform.find('.newsetname_zh_CH').val(),
                  menunewsetname_ko_KR:menunewsetform.find('.newsetname_ko_KR').val(),
                  menunewsetcontent:menunewsetform.find('.newsetcontent').val(),
                  menunewsetcontent_en:menunewsetform.find('.newsetcontent_en').val(),
                  menunewsetcontent_zh_HK:menunewsetform.find('.newsetcontent_zh_HK').val(),
                  menunewsetcontent_zh_CH:menunewsetform.find('.newsetcontent_zh_CH').val(),
                  menunewsetcontent_ko_KR:menunewsetform.find('.newsetcontent_ko_KR').val(),
                  menunewsetprice:menunewsetform.find('.newsetprice').val(),
              },
              success:function(data){

               menunewsetform.find('.menunewsetalert').html(data);
                //$('#alertalert').html(data);

             }
            })
        })