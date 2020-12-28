  var menuadd;
    $(".menuadd").click(function(){

    
       menutextform=$(this).parents(".menutextform");
       menuadd=menutextform.find(".menutr");
        menuadd.append('<tr><input value="new" type="hidden"  id="menunatureid1"  class="form-control menunatureid1"/><td><div class="input-group"><span class="input-group-addon">日本語</span><input type="text"   class="form-control menusize1" placeholder="日本語のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">英語</span><input type="text"   class="form-control menusize1_en" placeholder="英語のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">繁体字</span><input type="text"   class="form-control menusize1_zh_HK" placeholder="繁体字のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">簡体字</span><input type="text"   class="form-control menusize1_zh_CH" placeholder="簡体字のサイズを入力してください"/></div><div class="input-group"><span class="input-group-addon">韓国語</span><input type="text"   id="menusize1" class="form-control menusize1_ko_KR" placeholder="韓国語のサイズを入力してください"/></div></td><td><input type="text" id="menuprice1"  class="form-control menuprice1" placeholder="価格を入力してください"/></td></tr>');

    })