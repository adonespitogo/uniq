(function (window) {
  'use strict';

  window.App.config([
    '$stateProvider',
    '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider, $compile) {

      $urlRouterProvider.otherwise('/home');

      $stateProvider

        .state('app', {
          abstract: true,
          url: '/',
          template: JST['app/views/layout']
        })

        .state('app.home', {
          url: 'home',
          views: {
            header: {
              template: JST['app/views/header']
            },
            content: {
              template: JST['app/views/home']
            }
          }
        });

    }
  ]);

})(window);