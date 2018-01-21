website.factory('urlService',[function(){
    return {
        config : function(first){
            var http = 'http://localhost:8088/api/';
            return http + first;
        }
    }
}]);