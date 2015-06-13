(function () {

  App.controller('NewEventCtrl', [
    '$scope',
    'Event',
    'Category',
    'toastr',
    '$state',
    function ($scope, Event, Category, toastr, $state) {
      Category.getSubscribed().then(function (categories) {
        $scope.categories = categories;
      });

      $scope.post = function () {
        $scope.event.start_datetime = moment($scope.event.start.yyyy+'-'+$scope.event.start.mm+'-'+$scope.event.start.dd).format();
        $scope.event.end_datetime = moment($scope.event.end.yyyy+'-'+$scope.event.end.mm+'-'+$scope.event.end.dd).format();
        Event.save($scope.event).then(function (event) {
          toastr.success('Post successfully posted.');
          $state.go('app.event', {id: event.id});
        });
      };
    }
  ]);

}).call(this);