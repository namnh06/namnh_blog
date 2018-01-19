website.factory('urlService',[function(){
    return {
        config : function(first){
            var http = 'http://pwblog.test/api/';
            return http + first;
        }
    }
}]);