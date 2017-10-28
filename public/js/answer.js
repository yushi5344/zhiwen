/**
 * Created by yushi on 2017/10/24.
 */
"use strict"
var a=angular.module('answer',[]);
a.service('AnswerService',['$http',function($http){
    var me=this;
    me.answer_data={};
    me.answerRead=function(id){
        $http({
            method:'get',
            url:'api/user/answer/read/'+id,
            headers:{'Content-type':'application-x-www-form-urlencoded'}
        }).then(function(response){
            if(response.data.status==1){
                me.answer_data=response.data.data;
            }
        });
    }
    me.count_vote=function(answers){
        for (var i=0;i<answers.length;i++){
            var item=answers[i];
            if(!item['question_id']) continue;

        }
    }
}]);