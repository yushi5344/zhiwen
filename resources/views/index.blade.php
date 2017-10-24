<!doctype html>
<html lang="zh-cn" ng-app="zhiwen">
<head>
    <meta charset="UTF-8">
    <title>知问</title>
    <link rel="stylesheet" href="{{asset('public/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/node_modules/normalize-css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('public/node_modules/bootstrap/dist/css/bootstrap.css')}}">
    <script src="{{asset('public/node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('public/node_modules/angular/angular.js')}}"></script>
    <script src="{{asset('public/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/node_modules/angular-ui-router/release/angular-ui-router.js')}}"></script>
    <script src="{{asset('public/js/layer/layer.js')}}"></script>
    <script src="{{asset('public/js/base.js')}}"></script>
    <script src="{{asset('public/js/user.js')}}"></script>
    <script src="{{asset('public/js/question.js')}}"></script>
    <script src="{{asset('public/js/common.js')}}"></script>

</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">知问</a>
            </div>
            <div ng-controller="QuestionAddController">
                <form class="navbar-form navbar-left" ng-submit="question.go_add_question()">
                    <div class="form-group col-sm-10 col-lg-7">
                        <input type="text" class="form-control" ng-model="question.new_question.title">
                    </div>
                    <div class="col-lg-offset-1 col-lg-2 col-sm-2">
                        <button type="submit" class="btn btn-primary">提问</button>
                    </div>
                </form>
            </div>

            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#" ui-sref="home">首页</a></li>
            @if($session_id)
                 <li><a href="{{url('api/logout')}}">退出</a></li>
            @else
                <li><a href="#" ui-sref="login">登录</a></li>
                <li><a href="#" ui-sref="sign">注册</a></li>
            @endif
            </ul>
        </div>
    </nav>
    <div class="container">
        <div ui-view></div>
    </div>
</body>
{{csrf_field()}}
</html>