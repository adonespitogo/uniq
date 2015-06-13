(function (window) {
  'use strict';

  window.App.controller('EventCtrl', [
    '$scope',
    'Event',
    '$stateParams',
    function ($scope, Event, $stateParams) {
      Event.get($stateParams, function (event) {
        $scope.event = event;
        console.log(event);
      });
    }
  ]);

})(window);