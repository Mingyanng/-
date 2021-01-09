    var newmenuadd2;
    $(".newmenudelete").click(function(){

        newmenuform=$(this).parents(".newmenuinssert");

       newmenuadd2= newmenuform.find(".newmenutr").find("tr:last");
        var arrmid=newmenuadd2.children()[0].value;
        if (arrmid=='new'){
            newmenuadd2.remove();
            return;
        }
        if (newmenuform.find(".newmenutr").find("tr").length==1){
            alert('商品ごとに少なくとも1つの属性を必要があります！');
            return;
        }
        if(!confirm("本当に削除しますか?")){　
            return;
        }

    }) 