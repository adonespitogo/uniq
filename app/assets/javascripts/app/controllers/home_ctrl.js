(function (window) {
  'use strict';

  window.App.controller('HomeCtrl', ['$rootScope', function ($rootScope) {

    console.log($rootScope.user);

  }]);

})(window);