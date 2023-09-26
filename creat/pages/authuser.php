<script type="text/javascript">
$(document).ready(function(){
    document.onkeyup = function (e) {
	    e = e || window.event;
	    if (e.ctrlKey && e.keyCode == 13){
		    authuser();
            return false;
		}else if(e.keyCode == 13){
		    authuser();
            return false;
		}
	}
	return false;
});
</script>
<div class="wrapperauthUser">
    <div class="authuser">
        <div class="toptext">Авторизация</div>
        <div class="error" onclick="$(this).hide()"></div>
        <div class="wrapperinputblock">
            <input type="text" class="inputstyleauth value_login" placeholder="Логин">
            <input type="password" class="inputstyleauth value_pass" placeholder="Пароль">
            <button class="buttonStyle" onclick="authuser()">Войти</button>
        </div>
    </div>
</div>