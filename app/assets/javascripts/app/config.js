(function (window) {
  'use strict';

  window.App.run([
    '$rootScope',
    '$window',
    function ($rootScope, $window) {
      $rootScope.title = 'Uniq';
      $rootScope.user = angular.copy($window.user);
      delete $window.user;
    }
  ]);

})(window);