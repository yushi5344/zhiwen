/**
 * Created by yushi on 2017/10/23.
 */
"use strict"

var u=angular.module('user',[]);
//登录注册服务
u.service('UserService',['$http','$state',function($http,$state){
    var me=this;
    me.sign_data={};
    me.login_data={};
    me.sign=function(){
        $http({
            method:'post',
            data: $.param({username:me.sign_data.username,password:me.sign_data.password}),
            url:'api/signup',
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function(response){
            if(response.data.status){
                layer.msg(response.data.msg);
                me.sign_data={};
                $state.go('login');
            }else{
                layer.msg(response.data.msg);
            }
        },function(response){

        });
    }
    me.login=function(){
        $http({
            method:'post',
            data: $.param({username:me.login_data.username,password:me.login_data.password}),
            url:'api/signin',
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function(response){
            console.log(response.data.status);
            if(response.data.status){
                layer.msg(response.data.msg);
                me.login_data={};
                $state.go('home');
            }else{
                layer.msg(response.data.msg);
            }
        });
    }
    me.username_exist=function(){
        $http({
            method:'post',
            data: $.param({username:me.sign_data.username,_token:$('input[name="_token"]').val()}),
            url:'/api/user/exists',
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function(response){
            me.sign_data.user_exist=response.data;
            // console.log(response);
        },function(response){

        });
    }
}]);
//注册controller
u.controller('UserSignController',['$scope','UserService',function($scope,UserService){
    $scope.user=UserService;
    $scope.$watch(function(){
        return UserService.sign_data;
    },function(n,o){
        if (n.username!= o.username){
            UserService.username_exist();
        }
    },true);
}]);
//登录控制器
u.controller('UserLoginController',['$scope','UserService',function($scope,UserService){
    $scope.user=UserService;
}]);
//个人中心
u.controller('UserCenterController',['$scope','UserService','$stateParams',function($scope,UserService,$stateParams){
    $scope.user=UserService;
    console.log('$stateParams',$stateParams);
}]);