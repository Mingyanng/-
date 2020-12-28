  function logout(){ 
    if(confirm("本当にログアウトしますか？")){ 

    window.location.replace("sign-in/logout/logout.php");
    } 
    return false; 
    }