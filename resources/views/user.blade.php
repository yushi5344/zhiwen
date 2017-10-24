<div class="jumbotron">
    <div class="media">
        <div class="media-left">
            <img src="./public/images/a.jpg" alt="" class="media-object">
        </div>
        <div class="media-body">
            fsdfsdfjskl
        </div>
    </div>
</div>
<div>
    <ul class="nav nav-tabs" id="myTab">
        <li class="active" data-toggle="tab">
            <a href="#answer">他的回答</a>
        </li>
        <li data-toggle="tab">
            <a href="#question">他的提问</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="answer">
            <p>1菜鸟教程是一个提供最新的web技术站点，本站免费提供了建站相关的技术文档，帮助广大web技术爱好者快速入门并建立自己的网站。菜鸟先飞早入行——学的不仅是技术，更是梦想。</p>
        </div>
        <div class="tab-pane fade" id="question">
            <p>2菜鸟教程是一个提供最新的web技术站点，本站免费提供了建站相关的技术文档，帮助广大web技术爱好者快速入门并建立自己的网站。菜鸟先飞早入行——学的不仅是技术，更是梦想。</p>
        </div>
    </div>
</div>
<script>
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>