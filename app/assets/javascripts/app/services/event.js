(function () {

  App.service('Event', [
    '$http', 
    '$q',
    function ($http, $q) {

      var Event = this;

      Event.fetch = function() {
        var def = $q.defer();
        $http.get('/events').then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

      Event.fetchFavorites = function() {
        var def = $q.defer();
        $http.get('/event/favorites/').then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

      Event.get = function(id) {
        var def = $q.defer();
        $http.get('/events/'+id).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

      Event.save = function (event) {
        event.slug = '';
        var def = $q.defer();
        $http.post('/events/', event).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

      Event.markFavorite = function(id) {
        var def = $q.defer();
        $http.get('/event/mark-favorite/'+id).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };
      Event.unmarkFavorite = function(id) {
        var def = $q.defer();
        $http.get('/event/unmark-favorite/'+id).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

    }]);

}).call(this);