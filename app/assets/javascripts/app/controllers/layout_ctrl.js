(function (window) {
  'use strict';

  window.App.controller('LayoutCtrl', [
    '$scope',
    '$mdSidenav',
    function ($scope, $mdSidenav) {
      this.toggleLeftMenu = function () {
        $mdSidenav('left').toggle();
      };
    }
  ]);

})(window);