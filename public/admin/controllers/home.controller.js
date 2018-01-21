angular.module('home',[])
    .controller('HomeController',['$scope','authenticateService',function($scope,authenticateService){
        $scope.init = function(){

        };

        $scope.logout = function(){
            authenticateService.logout();
        };
    }]);