<div ng-controller="UserSignController"></div>
<form class="form-horizontal" ng-submit="user.sign()" name="sign_form">
    <div class="form-group" ng-class="{'has-error':sign_form.username.$invalid}">
        <label for="username" class="col-sm-2 col-lg-2 control-label">用户名：</label>
        <div class="col-sm-10 col-lg-4">
            <input type="text"
                   class="form-control"
                   placeholder="请输入用户名"
                   id="username"
                   name="username"
                   ng-model="user.sign_data.username"
                   ng-minlength="4"
                   ng-maxlength="16"
                   ng-model-options="{debounce:300}"
                   required
            >
        </div>
        <span class="help-block" ng-if="sign_form.username.$touched">
            <span ng-if="sign_form.username.$error.required">用户名为必填项</span>
            <span ng-if="sign_form.username.$error.minlength||sign_form.username.$error.maxlength">用户名不得小于4位不得大于16位</span>
            <span ng-if="user.sign_data.user_exist.status && !sign_form.username.$error.required">
                <span ng-class="{'glyphicon glyphicon-ok':user.sign_data.user_exist.status==1}"></span>
                <span ng-class="{'glyphicon glyphicon-remove':user.sign_data.user_exist.status==2}"></span>
                [:user.sign_data.user_exist.msg:]
            </span>
        </span>
    </div>
    <div class="form-group" ng-class="{'has-error':sign_form.password.$invalid}">
        <label for="password" class="col-sm-2 col-lg-2 control-label">密码：</label>
        <div class="col-sm-10 col-lg-4">
            <input type="password"
                   class="form-control"
                   placeholder="请输入密码"
                   id="password"
                   name="password"
                   ng-model="user.sign_data.password"
                   ng-minlength="6"
                   required
            >
        </div>
        <span class="help-block" ng-if="sign_form.password.$touched">
            <span ng-if="sign_form.password.$error.required">密码为必填项</span>
            <span ng-if="sign_form.password.$error.minlength">密码不得小于6位</span>
        </span>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit"
                    class="btn btn-primary"
                    ng-disabled="sign_form.$invalid||user.sign_data.user_exist.status==2"
            >注册</button>
        </div>
    </div>
</form>