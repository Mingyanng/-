 $('#alertbutton').click(function(){
         
            $.ajax({
              type:"post",
              url:"alert/alerttext.php",
              data:{alert:$('#alert1').val()},
              success:function(data){
              
                $('#alertalert').html(data);
               
             }
            })
        })