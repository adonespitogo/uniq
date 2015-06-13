(function (window) {
  'use strict';

  window.App.run([
    '$rootScope',
    '$window',
    'Category',
    '$state',
    function ($rootScope, $window, Category, $state) {
      $rootScope.title = 'Uniq';
      $rootScope.user = angular.copy($window.user);
      delete $window.user;

      $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams){
        Category.getSubscribed().then(function (categories) {
          if(categories.length === 0 && toState.name !== 'app.settings'){
            event.preventDefault();
            $state.go('app.settings');
          }
        });
      });

    }
  ]);

})(window);