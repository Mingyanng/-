var lastTime = new Date().getTime();
            var currentTime = new Date().getTime();
            var timeOut = 20 * 60 * 1000; 
            $(function(){
                $(document).mouseover(function(){
                    lastTime = new Date().getTime();
                });
            });
            function testTime(){
                currentTime = new Date().getTime();
                if(currentTime - lastTime > timeOut){ 
                     alert('長時間無操作ので、もう一度サインインしてください。');location.replace("sign-in/logout/logout.php");
                }
            }
            window.setInterval(testTime, 1000);