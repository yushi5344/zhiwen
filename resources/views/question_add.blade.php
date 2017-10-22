
<form class="form-horizontal" name="question_add" ng-submit="question.add()">
    <div class="form-group" ng-class="{'has-error':question_add.question_title.$invalid && question_add.question_title.$touched}">
        <label for="question_title" class="control-label col-sm-2 col-lg-2">问题标题：</label>
        <div class="col-lg-4 col-sm-10">
            <input type="text"
                   class="form-control"
                   id="question_title"
                   ng-model="question.new_question.title"
                   ng-minlength="4"
                   name="question_title"
                   required
            >
        </div>
    <span class="help-block" ng-if="question_add.question_title.$touched">
        <span ng-if="question_add.question_title.$error.required">问题标题必须填写</span>
        <span ng-if="question_add.question_title.$error.minlength">问题标题不得小于4位</span>
    </span>
    </div>
    <div class="form-group" ng-class="{'has-error':question_add.question_desc.$invalid && question_add.question_desc.$touched}">
        <label for="question_desc" class="control-label col-lg-2 col-sm-2">问题描述</label>
        <div class="col-sm-10 col-lg-4">
        <textarea
                name="question_desc"
                rows="10"
                id="question_desc"
                class="form-control"
                ng-model="question.new_question.desc"
                required
                ng-maxlength="200"
        ></textarea>
        </div>
    <span class="help-block" ng-if="question_add.question_desc.$touched">
        <span ng-if="question_add.question_desc.$error.required">请输入问题描述</span>
        <span ng-if="question_add.question_desc.$error.maxlength">请不要超过200个字符</span>
    </span>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary" ng-disabled="question_add.$invalid">提交</button>
        </div>
    </div>
</form>

