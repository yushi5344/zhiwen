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
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">知问</a>
            </div>

            <form action="" class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-default">提交</button>
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#" ui-sref="home">首页</a></li>
            <li><a href="#" ui-sref="login">登录</a></li>
            <li><a href="#" ui-sref="sign">注册</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div ui-view></div>
    </div>
</body>
{{csrf_field()}}
</html>
<script>
    $('.navbar-right li').click(function(){
        $('.navbar-right li').removeClass('active');
        $(this).addClass('active');
    });
</script>