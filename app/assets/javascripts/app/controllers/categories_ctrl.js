(function () {

  App.controller('CategoriesCtrl', [
    '$scope',
    'Category',
    '$state',
    function ($scope, Category, $state) {

      $scope.$state = $state;

      Category.getSubscribed().then(function (cats) {
        $scope.categories = cats;

        if (cats.length > 0) {
          $state.go('app.categories.category', {id: cats[0].id});
        }

      });

    }
  ]);

}).call(this);