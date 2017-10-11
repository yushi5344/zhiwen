<!doctype html>
<html lang="zh" ng-app="zhiwen">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('public/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/node_modules/normalize-css/normalize.css')}}">
    <script src="{{asset('public/node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('public/node_modules/angular/angular.js')}}"></script>
    <script src="{{asset('public/node_modules/angular-ui-router/release/angular-ui-router.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/base.js')}}"></script>
</head>
<body>
<div class="navbar clearfix">
    <div class="fl">
        <div class="navbar-item brand">知问</div>
        <div class="navbar-item">
            <input type="text">
        </div>
    </div>
    <div class="fr">
        <div class="navbar-item" ui-sref="home">首页</div>
        <div class="navbar-item" ui-sref="login">登录</div>
        <div class="navbar-item" ui-sref="signup">注册</div>
    </div>
</div>
<div class="page">
    <div ui-view></div>
</div>


</body>
<script type="text/ng-template" id="home.tpl">
<div class="home container">
    首页
    sdf;sfj;lsdfjl;skdfjkl;sfdjkl;fj;asdjfkl;sfjksdjfklsdjfklsdjfklds
</div>
</script>
<script type="text/ng-template" id="login.tpl">
    <div class="login container">
        登录
    </div>
</script>

<script type="text/ng-template" id="signup.tpl">
    <div ng-controller="SignupController" class="home container">
        <div class="card">
            <h1>注册</h1>
            <{ User.signup_data }>
            <form name="signup_form" ng-submit="User.signup()">
                <div>
                    <label for="">用户名：</label>
                    <input type="text" ng-minlength="4" ng-maxlength="20" name="username" required ng-model="User.signup_data.username">
                    <div class="input-error-set">
                        <div ng-if="signup_form.username.$error.required">用户名必填</div>
                    </div>
                </div>
                <div>
                    <label for="">密码：</label>
                    <input type="text" ng-minlength="6" name="password" required ng-model="User.signup_data.password">
                </div>

                <button type="submit" ng-disabled="signup_form.$invalid">注册</button>
            </form>
        </div>
    </div>
</script>
</html>