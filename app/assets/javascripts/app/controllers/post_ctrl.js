(function (window) {
  'use strict';

  window.App.controller('PostCtrl', [
    '$scope',
    '$stateParams',
    function ($scope, $stateParams) {
      console.log($stateParams);
    }
  ]);

})(window);