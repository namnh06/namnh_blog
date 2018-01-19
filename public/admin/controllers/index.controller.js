var website = angular.module('website',[
    'login',
    'home',
    'ui.router',
    'angular-jwt',
    'LocalStorageModule'
]);

website.config(['$stateProvider','$locationProvider','$urlRouterProvider','localStorageServiceProvider',function($stateProvider,$locationProvider,$urlRouterProvider,localStorageServiceProvider){
    $locationProvider.hashPrefix('');
    localStorageServiceProvider
        .setPrefix('namnhblog');
    $urlRouterProvider.otherwise('login');
    $stateProvider
        .state('login',{
            url:'/login',
            templateUrl:'pages/login.html',
            controller:'LoginController'
        })
        .state('home',{
            url:'/home',
            templateUrl:'pages/home.html',
            controller : 'HomeController'
        });
}]);

website.controller('IndexController',['$scope',function($scope){
}]);