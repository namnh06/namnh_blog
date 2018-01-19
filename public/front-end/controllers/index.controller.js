var website = angular.module('website',[
    'home',
    'ui.router'
]);

website.config(['$stateProvider','$locationProvider','$urlRouterProvider',function($stateProvider,$locationProvider,$urlRouterProvider){
    $locationProvider.hashPrefix('');
    $urlRouterProvider.otherwise('home');
    $stateProvider
        .state('home',{
            url:'/home',
            templateUrl:'pages/home.html',
            controller : 'HomeController'
        })
        .state('category',{
            url:'/category',
            templateUrl:'pages/category.html',
            controller:'CategoryController'
        })
        .state('news',{
            url:'/news',
            templateUrl:'pages/news.html',
            controller:'NewsController'
        });
}]);

website.controller('IndexController',['$scope',function($scope){

}]);