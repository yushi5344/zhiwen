
<div class="row" style="margin-bottom: 10px;" ng-repeat=" row in timeline.data">
    <div class="col-sm-8" style="border: 1px solid #ccc; border-radius: 2px;" >
        <div class="h5" ng-if="row.question_id">[:row.user.username:]添加了该回答</div>
        <div class="h5" ng-if="!row.question_id">[:row.user.username:]添加了该提问</div>
        <div class="h2"><a href="" ui-sref="question.detail({id:row.id})">[:row.title:]</a></div>
        <div class="row">
            <div class="col-lg-1" style="margin-right: 0px;">
                <a href="#" ui-sref="user({id:row.user.id})"><img src="./public/images/a.jpg" alt="" class="img-rounded"style="width: 32px;height: 32px;"></a>
            </div>
            <div class="col-lg-5"  style="padding-left: 0px;">[:row.user.username:] &nbsp;&nbsp;[:row.user.intro:]</div>
        </div>
        <div class="media">
            <a href="#" class="media-left">
                <img src="./public/images/a.jpg" alt="">
            </a>
            <div class="media-body" ng-if="!row.question_id">
                [:row.desc:]
            </div>
            <div class="media-body" ng-if="row.question_id">
                <h4><a href="" ui-sref="question.detail({id:row.question.id})">[:row.question.title:]</a></h4>
               [:row.content:]
            </div>
        </div>
    </div>
</div>
<div class="col-sm-8" ng-if="timeline.pending">
    <nav aria-label="..." >
        <ul class="pager">
            <li>加载中...</li>
        </ul>
    </nav>

</div>
<div class="col-sm-8" ng-if="timeline.no_more_data">
    <nav aria-label="..." >
        <ul class="pager">
            <li>没有更多数据啦</li>
        </ul>
    </nav>
</div>



