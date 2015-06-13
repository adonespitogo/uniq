(function () {

  App.service('Event', [
    '$http', 
    '$q',
    function ($http, $q) {

      var Event = this;

      Event.fetch = function(page) {
        var def = $q.defer();
        $http.get('/event/by-page/'+page).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

    }]);

}).call(this);