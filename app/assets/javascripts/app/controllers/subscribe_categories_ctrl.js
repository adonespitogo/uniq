(function () {

  App.controller('SubscribeCategoriesCtrl', [
    '$scope',
    'Category',
    'toastr',
    '$state',
    function ($scope, Category, toastr, $state) {
      $scope.categories = [];

      Category.fetch().then(function (data) {
        $scope.categories = data;

        Category.getSubscribed().then(function (data) {
          $scope.categories = _.map($scope.categories, function (cat) {
            for (var i = data.length - 1; i >= 0; i--) {
              if(data[i].id === cat.id){
                cat.selected = true;
                break;
              }
            };
            return cat;
          });
        });

      });

      $scope.toggleFollow = function (category) {
        if (category.selected) {
          Category.follow(category.id).then(function () {
            toastr.success('Following category "'+ category.name+'".');
          });
        }
        else {
          Category.unfollow(category.id).then(function () {
            toastr.info('Unfollowed category "'+ category.name+'".');
          });
        }
      };

    }
  ]);


}).call(this);