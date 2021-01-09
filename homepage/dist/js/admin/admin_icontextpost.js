   $('#icon2').click(function(){
        $.ajax({
          type:"post",
            url:"icon/icontext.php",
            data:{
                    ititle1:$('#ititle1a').val(),
                    itext1:$('#itext1a').val(),
                    itext1_en:$('#itext1a_en').val(),
                    itext1_zh_HK:$('#itext1a_zh_HK').val(),
                    itext1_zh_CH:$('#itext1a_zh_CH').val(),
                    itext1_ko_KR:$('#itext1a_ko_KR').val()         
                 },
            success:function(data){
                $('#iconalert2').html(data);
                 
            }
        })
    })