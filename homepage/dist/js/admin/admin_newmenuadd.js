 var newmenuadd;
    $(".newmenuadd").click(function(){

    // $(function(){
      newmenuform=$(this).parents(".newmenuinssert");
       newmenuadd=newmenuform.find(".newmenutr");
        newmenuadd.append(' <tr><input value="new" type="hidden" /><td><div class="input-group"><span class="input-group-addon">日本語</span><input type="text"   class="form-control newmenusize1" placeholder="日本語のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">英語</span><input type="text"   class="form-control newmenusize1_en" placeholder="英語のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">繁体字</span><input type="text"   class="form-control newmenusize1_zh_HK" placeholder="繁体字のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">簡体字</span><input type="text"   class="form-control newmenusize1_zh_CH" placeholder="簡体字のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">韓国語</span><input type="text"   id="newmenusize1" class="form-control newmenusize1_ko_KR" placeholder="韓国語のサイズを入力してください"/></div></td><td><input type="text" id="newmenuprice1"  class="form-control newmenuprice1" placeholder="価格を入力してください"/></td></tr>');

    })