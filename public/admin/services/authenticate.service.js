website.factory('authenticateService',['$rootScope','$http','urlService','jwtHelper','$state','localStorageService',function($rootScope,$http,urlService,jwtHelper,$state,localStorageService){
    return {
        login : function(credentials){
            $http.post(urlService.config('login'),credentials)
                .then(function(response){
                    if(response.data.status === 'success'){
                        var token = response.data.data.token;
                        var tokenPayload = jwtHelper.decodeToken(token);
                        $rootScope.adminEmail = tokenPayload.email;
                        $rootScope.adminName = tokenPayload.name;
                        localStorageService.set('token',token);
                        $http.defaults.headers.common.Authorization = 'Bearer' + token;
                        $state.go('home');
                    }
                });
        },
        logout : function(){
            var token = localStorageService.get('token');
            $http.get(urlService.config('logout'))
                .then(function(response){
                    if(response.data.status === 'success'){
                        $http.defaults.headers.common.Authorization = 'Bearer' + token;
                        localStorageService.remove('token');
                        $state.go('login');
                    }
                });

        }
    }
}]);