<?php
if($INFOUSER['message_watch'] == 'no'){
?>
<!--Модальное окно-->
<div class="wrapper_alert_message">
    <div class="alert_message_step_1">
        <div class="title_alert_message">Опрос</div>
        <div class="text_alert_message">Какой вы видете нашу систему?</div>
        <textarea name="answer_alert_message" cols="30" rows="10" class="answer_alert_message" placeholder="Ваш ответ напишите тут"></textarea>
        <div style="text-align:right;margin:30px;"><button class="buttonStyle" id="send_otchet_cdo" onclick="send_answer_alert_message()">Ответить</button></div>
    </div>
    <div class="alert_message_step_2" style="display:none;">
        <img src="/img/icon_sc.png" alt="">
        <div class="textsccsesMA">Ваш ответ отправлен, спасибо за уделенное время!</div>
        <button class="buttonStyle" id="send_otchet_cdo" onclick="$('.wrapper_alert_message').remove();$('.bacground_alert_message').remove();">Закрыть</button>
    </div>
</div>
<div class="bacground_alert_message"></div>
<?}?>