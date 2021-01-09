 $.fn.bootstrapSwitch.defaults.onColor = 'danger'

     var ss;

    $(".hidevalue0").bootstrapSwitch('state',true);
    $(".hidevalue1").bootstrapSwitch('state',false);


     $('#mySwitch input').on('switchChange.bootstrapSwitch', function (event,state) {
      var p=$(this).parents(".liexiaoshi")
   
      var hide=p.find(".commodityhide").val();
      ss=$(this);
      if (hide=="1"){
       
         $(this).bootstrapSwitch('state',false);
        p.find(".commodityhide").val("0");
      }
      else{
        
         $(this).bootstrapSwitch('state',true);
        p.find(".commodityhide").val("1");
      }

        $.ajax({
          type:"post",
            url:"alert/alerthide.php",
            data:{hide:hide},
             success:function(date)
          {
              
          }
        });
                });