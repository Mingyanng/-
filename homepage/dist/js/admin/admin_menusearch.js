$('.menusearchbtn').click(function(){
    menusearch = $(this).parents(".menusearch");
    window.location.href="./admin.php?search="+menusearch.find('.menusearchinput').val()+"#menu"
});