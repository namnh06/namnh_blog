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

website.run(['$rootScope','localStorageService','jwtHelper','$location',function($rootScope,localStorageService,jwtHelper,$location){
    var token = localStorageService.get('token');
    if(jwtHelper.isTokenExpired(token)){
        $state.go('login');
    } else {
        $http.defaults.headers.common.Authorization = 'Bearer' + token;
    }

    $rootScope.$on('$locationChangeStart', function (event, next, current) {
        var publicPages = ['/login'];
        var restrictedPage = publicPages.indexOf($location.path()) === -1;
        if (restrictedPage && !token) {
            $location.path('/login');
        }
    });
}]);

website.controller('IndexController',['$scope',function($scope){
}]);