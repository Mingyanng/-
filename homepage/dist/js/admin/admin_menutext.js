    var menutextform;

    $(".menutext").click(function(){


       menutextform=$(this).parents(".menutextform");
        var arrmp=[];
        var tell=1;
        for (var i=0;i<menutextform.find('.menuprice1').length;i++){
            var pp=menutextform.find('.menuprice1')[i].value;
   
            arrmp.push(pp);
            if (pp.length<=0){
                tell=0;
            }
        }
        var arrms=[];
         for (var i=0;i<menutextform.find('.menusize1').length;i++){
             var ss=menutextform.find('.menusize1')[i].value;

             arrms.push(ss);
            if (ss.length<=0){
                tell=0;
            }
        }
            var arrms_en=[];
         for (var i=0;i<menutextform.find('.menusize1_en').length;i++){
             var ss_en=menutextform.find('.menusize1_en')[i].value;

             arrms_en.push(ss_en);
            if (ss_en.length<=0){
                tell=0;
            }
        }
            var arrms_zh_HK=[];
         for (var i=0;i<menutextform.find('.menusize1_zh_HK').length;i++){
             var ss_zh_HK=menutextform.find('.menusize1_zh_HK')[i].value;
  
             arrms_zh_HK.push(ss_zh_HK);
            if (ss_zh_HK.length<=0){
                tell=0;
            }
        }
            var arrms_zh_CH=[];
         for (var i=0;i<menutextform.find('.menusize1_zh_CH').length;i++){
             var ss_zh_CH=menutextform.find('.menusize1_zh_CH')[i].value;
  
             arrms_zh_CH.push(ss_zh_CH);
            if (ss_zh_CH.length<=0){
                tell=0;
            }
        }
            var arrms_ko_KR=[];
         for (var i=0;i<menutextform.find('.menusize1_ko_KR').length;i++){
             var ss_ko_KR=menutextform.find('.menusize1_ko_KR')[i].value;

             arrms_ko_KR.push(ss_ko_KR);
            if (ss_ko_KR.length<=0){
                tell=0;
            }
        }
        var arrmid=[];
         for (var i=0;i<menutextform.find('.menunatureid1').length;i++){
             var ii=menutextform.find('.menunatureid1')[i].value;
 
             arrmid.push(ii);
            if (ii.length<=0){
                tell=0;
            }
        }

        if(tell==0)
            {
            menutextform.find('.menutextalert').html('サイス或いは価格を入力してください！');    
            }else{



        $.ajax({
          type:"post",
            url:"menu/menuupdate.php",

            data:
            {
              menuid: menutextform.find('.menuid1').val(),
              menuname:menutextform.find('.menuname1').val(),
                menuname_en:menutextform.find('.menuname1_en').val(),
                menuname_zh_HK:menutextform.find('.menuname1_zh_HK').val(),
                menuname_zh_CH:menutextform.find('.menuname1_zh_CH').val(),
                menuname_ko_KR:menutextform.find('.menuname1_ko_KR').val(),
              menunatureid:arrmid,
              menusize:arrms,
                menusize_en:arrms_en,
                menusize_zh_HK:arrms_zh_HK,
                menusize_zh_CH:arrms_zh_CH,
                menusize_ko_KR:arrms_ko_KR,
              menuprice:arrmp,
              menuother:menutextform.find('.menuother1').val(),
                 menuother_en:menutextform.find('.menuother1_en').val(),
                 menuother_zh_HK:menutextform.find('.menuother1_zh_HK').val(),
                 menuother_zh_CH:menutextform.find('.menuother1_zh_CH').val(),
                 menuother_ko_KR:menutextform.find('.menuother1_ko_KR').val(),

            },
            success:function(data){
                menutextform.find('.menutextalert').html(data);
                
            }
        })
    }
    })