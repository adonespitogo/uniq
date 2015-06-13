(function () {
  App.service('Category', [
    '$http',
    '$q',
    function ($http, $q) {

      var categories = null;

      this.getSubscribed = function () {
        var def = $q.defer();
        $http.get('/category/my-categories').then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

      this.fetch = function () {
        var def = $q.defer();
        if(!categories) {
          $http.get('/category/all').then(function (resp) {
            categories = resp.data;
            def.resolve(resp.data);
          });
        }
        else {
          def.resolve(categories);
        }
        return def.promise;
      };

      this.follow = function (cat_id) {
        var def = $q.defer();
        $http.get('/category/follow/'+cat_id).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

      this.unfollow = function (cat_id) {
        var def = $q.defer();
        $http.get('/category/un-follow/'+cat_id).then(function (resp) {
          def.resolve(resp.data);
        });
        return def.promise;
      };

    }
  ]);
}).call(this);