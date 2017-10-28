/**
 * Created by yushi on 2017/10/23.
 */
"use strict"
var c=angular.module('common',[]);
c.service('TimelineService',['$http',function($http){
    var me=this;
   // me.data=[];
    //me.current_page=1;
    me.get=function(conf){
        if(me.pending||me.no_more_data) return;
        me.pending=true;
        conf=conf||{page:me.current_page}
        $http({
            method:'post',
            url:'api/timeline',
            data: $.param(conf),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function(response){
            if(response.data.status){
                if (response.data.data.length){
                    me.data=me.data.concat(response.data.data);
                    me.current_page++;
                }else{
                    me.no_more_data=true;
                }
            }
            me.pending=false;
        });
    }
    me.reset_state=function(){
        me.data=[];
        me.current_page=1;
        me.no_more_data=0;
    }
}]);

//首页时间线
c.controller('HomeController',['$scope','TimelineService',function($scope,TimelineService){
    $scope.timeline=TimelineService;
    TimelineService.reset_state();
    TimelineService.get();
    var $win=$(window);
    $win.on('scroll',function(){
        if($win.scrollTop()-($(document).height()-$win.height())>-30){
            TimelineService.get();
        }
    });
}]);

c.directive('commentShow',[function(){
    return {
        restrict:'A',
        link:function(scope,elem,attr){
            $(elem).click(function(){
                $(this).parent().next().toggle();
            });
        }
    }
}]);
