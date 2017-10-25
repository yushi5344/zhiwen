" use strict"
var m=angular.module('zhiwen',['ui.router','user','question','common','answer']);
m.config([
    '$interpolateProvider',
    '$stateProvider',
    '$urlRouterProvider',
    function($interpolateProvider,$stateProvider,$urlRouterProvider){
        $interpolateProvider.startSymbol('[:');
        $interpolateProvider.endSymbol(':]');

        $urlRouterProvider.otherwise('/home');
        $stateProvider
            .state('home',{
                url:'/home',
                templateUrl:'resources/views/home.blade.php',
                controller:'HomeController'
            })
            .state('login',{
                url:'/login',
                templateUrl:'resources/views/login.blade.php'
            })
            .state('sign',{
                url:'/sign',
                templateUrl:'resources/views/sign.blade.php',
                controller:'UserSignController'
            })
            .state('question',{
                url:'/question',
                abstract:true,
                template:'<div ui-view></div>',
                controller:'QuestionController'
            })
            .state('question.add',{
                url:'/add',
                templateUrl:'resources/views/question_add.blade.php',
                controller:'QuestionAddController'
            })
            .state('question.detail',{
                url:'/detail/{id}',
                templateUrl:'resources/views/question_detail.blade.php',
                controller:'QuestionDetailController'
            })
            .state('user',{
                url:'/user/{id}',
                templateUrl:'resources/views/user.blade.php',
                controller:'UserCenterController'
            })
}]);



