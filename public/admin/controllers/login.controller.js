angular.module('login',[])
.controller('LoginController',['$scope','authenticateService',function($scope,authenticateService){
    $scope.login = function(credentials){
        authenticateService.login(credentials);
    };
}]);