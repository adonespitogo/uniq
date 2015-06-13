(function () {

  App.controller('CategoriesCtrl', [
    '$scope',
    'Category',
    function ($scope, Category) {
      Category.getSubscribed().then(function (cats) {
        $scope.categories = cats;
      });
    }
  ]);

}).call(this);