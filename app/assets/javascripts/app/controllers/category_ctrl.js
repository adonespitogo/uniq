(function () {

  App.controller('CategoryCtrl', [
    '$scope',
    'Category',
    '$stateParams',
    function ($scope, Category, $params) {
      $scope.catId = $params.id;
      Category.events($params.id).then(function (events) {
        $scope.events = events;
      });
    }
  ]);

}).call(this);