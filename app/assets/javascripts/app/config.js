(function (window) {
  'use strict';

  window.App.run([
    '$rootScope',
    '$window',
    'Category',
    '$state',
    'toastr',
    function ($rootScope, $window, Category, $state, toastr) {
      $rootScope.title = 'Uniq';
      $rootScope.user = angular.copy($window.user);
      delete $window.user;

      $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams){
        Category.getSubscribed().then(function (categories) {
          if(categories.length === 0 && toState.name !== 'app.settings'){
            event.preventDefault();
            $state.go('app.settings');
            toastr.warning('Please tell us your category of interest first so we know what information to cater.');
          }
        });
      });

    }
  ]);

})(window);