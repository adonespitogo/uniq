(function (window) {
  'use strict';

  window.App.controller('EventCtrl', [
    '$scope',
    'Event',
    '$stateParams',
    function ($scope, Event, $stateParams) {
      Event.get($stateParams.id).then(function (event) {
        $scope.event = event;
      });
    }
  ]);

})(window);