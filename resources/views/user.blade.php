<div class="jumbotron">
    <div class="media">
        <div class="media-left">
            <img src="./public/images/a.jpg" alt="" class="media-object">
        </div>
        <div class="media-body">
            <h4>[:user.user_data.username:]</h4>
            <p>[:user.user_data.intro:]</p>
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
            <p ng-repeat="v in useransw.answer_data">
                [:v.content:]
            </p>
        </div>
        <div class="tab-pane fade" id="question">
            <p ng-repeat="v in userquest.question_data">
                [:v.title:]
            </p>
        </div>
    </div>
</div>
<script>
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>