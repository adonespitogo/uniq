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
          template: JST['app/views/home']
        })
        .state('app.post', {
          url: 'post/:id',
          template: JST['app/views/post']
        });

    }
  ]);

})(window);