<?/*
Settings
title:Газета
preincludepages:
postincludepages:
*/
?>
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;"><a href="/">главная</a> &mdash; газета</div>
    <?if(file_exists($DIR.'/docs/gazets.pdf')){?>
    <object data="/docs/gazets.pdf" type="application/pdf" style="width:100%;height:calc(100vh - 325px);">
        <embed src="/docs/gazets.pdf" type="application/pdf">
            <p>This browser does not support PDFs. Please download the PDF to view it: <a href="/docs/gazets.pdf">Download PDF</a>.</p>
        </embed>
    </object>
    <?}else{echo'<div class="NoData">Газета находится в разработке</div>';}?>
</div>