<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">[:question.quest_info.title:]</div>
        <div class="panel-body">
            [:question.quest_info.desc:]
        </div>
    </div>
    <div class="row" style="margin-bottom: 10px;" ng-repeat="v in question.quest_info.answers_with_userinfo">
        <div class="col-sm-12" style="border: 1px solid #ccc; border-radius: 2px;" >
            <div class="row">
                <div class="col-lg-1" style="margin-right: 0px;">
                    <a href="#" ui-sref="user({id:v.user.id})"><img src="./public/images/a.jpg" alt="" class="img-rounded"style="width: 32px;height: 32px;"></a>
                </div>
                <div class="col-lg-5"  style="padding-left: 0px;">[:v.user.username:] &nbsp;&nbsp;[:v.user.intro:]</div>
            </div>
            <div class="media">
                <div class="media-body">
                    [:v.content:]
                </div>
            </div>
        </div>
    </div>
</div>
