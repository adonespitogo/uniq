(function () {
  'use strict';

  App.controller('ProfileCtrl', [
    '$scope',
    'User',
    'toastr',
    function ($scope, User, toastr) {


      $scope.usr = angular.copy(User.currentUser);
      $scope.usr.birth = {
        date: moment($scope.usr.birth_date).get('date'),
        month: moment($scope.usr.birth_date).get('month') + 1,
        year: moment($scope.usr.birth_date).get('year'),
      };

      $scope.updateUser = function () {
        $scope.usr.birth_date = moment(
          $scope.usr.birth.year+'-'
          +$scope.usr.birth.month+'-'
          +$scope.usr.birth.date
        ).format();

        User.updateProfile($scope.usr).then(function (usr) {
          toastr.success('Profile updated successfully.');
        });
      };

      $scope.updatePassword = function () {
        var user = {
          id: User.currentUser.id,
          password: $scope.usr.password,
          password_confirmation: $scope.usr.password_confirmation,
        };
        User.updatePassword(user).then(function () {
          toastr.success('Password updated successfully.');
        }, function (errors) {
          var msgs = '';
          for (var i = errors.password.length - 1; i >= 0; i--) {
            msgs = errors.password[i] + '\n';
          };
          toastr.error(msgs);
        });
      };

    }
  ]);

}).call(this);