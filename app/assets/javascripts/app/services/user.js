(function (window) {
  'use strict';

  window.App.service('User', [
    '$http',
    '$q',
    '$rootScope',
    function ($http, $q, $rootScope) {

      var User = this;

      User.currentUser = angular.copy($rootScope.user);

      User.updateProfile = function (user) {
        var def = $q.defer();
        $http.put('/users/' + user.id, user).then(function (resp) {
          $rootScope.user = resp.data;
          def.resolve(resp.data);
        });
        return def.promise;
      };

      User.updatePassword = function (user) {
        var def = $q.defer();
        $http.put('/users/' + user.id +'/password', user).then(function (resp) {
          def.resolve(resp.data);
        }, function (resp) {
          def.reject(resp.data);
        });
        return def.promise;
      };

      return User;

    }]);

})(window);