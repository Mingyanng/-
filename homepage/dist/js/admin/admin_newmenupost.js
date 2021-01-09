
    $(".newmenubutton").click(function(){


       newmenuform=$(this).parents(".newmenuinssert");
            var tellno=1;
    var checknewname= newmenuform.find('.newmenuname1').val(); 
        var checknewother= newmenuform.find('.newmenuother1').val(); 
    if(checknewname.length==0||checknewother.length==0){  
         tellno=0;
    } 
        var arrmp=[];
        var tell=1;
        for (var i=0;i<newmenuform.find('.newmenuprice1').length;i++){
            var pp=newmenuform.find('.newmenuprice1')[i].value;

            arrmp.push(pp);
            if (pp.length<=0){
                tell=0;
            }
        }
        var arrms=[];
         for (var i=0;i<newmenuform.find('.newmenusize1').length;i++){
             var ss=newmenuform.find('.newmenusize1')[i].value;

             arrms.push(ss);
            if (ss.length<=0){
                tell=0;
            }
        }
          var arrms_en=[];
         for (var i=0;i<newmenuform.find('.newmenusize1_en').length;i++){
             var ss_en=newmenuform.find('.newmenusize1_en')[i].value;

             arrms_en.push(ss_en);
            if (ss_en.length<=0){
                tell=0;
            }
        }
            var arrms_zh_HK=[];
         for (var i=0;i<newmenuform.find('.newmenusize1_zh_HK').length;i++){
             var ss_zh_HK=newmenuform.find('.newmenusize1_zh_HK')[i].value;

             arrms_zh_HK.push(ss_zh_HK);
            if (ss_zh_HK.length<=0){
                tell=0;
            }
        }
            var arrms_zh_CH=[];
         for (var i=0;i<newmenuform.find('.newmenusize1_zh_CH').length;i++){
             var ss_zh_CH=newmenuform.find('.newmenusize1_zh_CH')[i].value;

             arrms_zh_CH.push(ss_zh_CH);
            if (ss_zh_CH.length<=0){
                tell=0;
            }
        }
            var arrms_ko_KR=[];
         for (var i=0;i<newmenuform.find('.newmenusize1_ko_KR').length;i++){
             var ss_ko_KR=newmenuform.find('.newmenusize1_ko_KR')[i].value;

             arrms_ko_KR.push(ss_ko_KR);
            if (ss_ko_KR.length<=0){
                tell=0;
            }
        }


        if(tellno==0)
            {
            newmenuform.find('.newmenutextalert').html('商品名或いは紹介を入力してください！');

            }else if(tell==0){

                newmenuform.find('.newmenutextalert').html('サイズ或いは価格を入力してください！'); 
            }else{
                console.log("tell1");

         console.log("tell1");
        $.ajax({
          type:"post",
            url:"menu/menuinssert.php",
            data:
            {


                newmenuname:newmenuform.find('.newmenuname1').val(),
                newmenuname_en:newmenuform.find('.newmenuname1_en').val(),
                newmenuname_zh_HK:newmenuform.find('.newmenuname1_zh_HK').val(),
                newmenuname_zh_CH:newmenuform.find('.newmenuname1_zh_CH').val(),
                newmenuname_ko_KR:newmenuform.find('.newmenuname1_ko_KR').val(),
                newmenusize:arrms,
                newmenusize_en:arrms_en,
                newmenusize_zh_HK:arrms_zh_HK,
                newmenusize_zh_CH:arrms_zh_CH,
                newmenusize_ko_KR:arrms_ko_KR,
                newmenuprice:arrmp,
                newmenuother:newmenuform.find('.newmenuother1').val(),
                newmenuother_en:newmenuform.find('.newmenuother1_en').val(),
                newmenuother_zh_HK:newmenuform.find('.newmenuother1_zh_HK').val(),
                newmenuother_zh_CH:newmenuform.find('.newmenuother1_zh_CH').val(),
                newmenuother_ko_KR:newmenuform.find('.newmenuother1_ko_KR').val(),
            },
            success:function(data){

                    console.log(data);

            }
        });
                 newmenuform.submit();


    }
    })
    