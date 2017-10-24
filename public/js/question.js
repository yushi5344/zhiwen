/**
 * Created by yushi on 2017/10/23.
 */

"use strict"
var q=angular.module('question',[]);
//提问服务
q.service('QuestionService',['$http','$state',function($http,$state){
    var me=this;
    me.new_question={};
    me.go_add_question=function(){
        $state.go('question.add');
    }
    me.add=function(){
        $http({
            method:'post',
            url:'api/quest',
            data: $.param({title:me.new_question.title,desc:me.new_question.desc}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function(response){
            if(response.data.status==2){
                layer.msg(response.data.msg);
                $state.go('login');
            }else if (response.data.status==1){
                layer.msg(response.data.msg);
                $state.go('home');
            }else{
                layer.msg(response.data.msg);
            }
        });
    }
}]);

//添加提问控制器
q.controller('QuestionAddController',['$scope','QuestionService',function($scope,QuestionService){
    $scope.question=QuestionService;
}]);