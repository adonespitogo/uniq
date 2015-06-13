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
          template: JST['app/views/home'],
          controller: 'HomeCtrl as HomeCtrl'
        })
        .state('app.profile', {
          url: 'profile',
          template: JST['app/views/profile'],
          controller: 'ProfileCtrl as ProfileCtrl'
        })
        .state('app.newEvent', {
          url: 'event/new',
          template: JST['app/views/new-event'],
          controller: 'NewEventCtrl as NewEventCtrl'
        })
        .state('app.event', {
          url: 'event/:id',
          template: JST['app/views/event'],
          controller: 'EventCtrl as EventCtrl'
        })
        .state('app.favorites', {
          url: 'favorites',
          template: JST['app/views/home'],
          controller: 'FavoritesCtrl as FavoritesCtrl'
        })
        .state('app.categories', {
          url: 'categories',
          template: JST['app/views/categories'],
          controller: 'CategoriesCtrl as CategoriesCtrl'
        })
        .state('app.categories.category', {
          url: '/category/:id',
          template: JST['app/views/category'],
          controller: 'CategoryCtrl as CategoryCtrl'
        })
        .state('app.settings', {
          url: 'settings',
          template: JST['app/views/settings'],
          controller: 'SubscribeCategoriesCtrl as SubscribeCategoriesCtrl'
        });

    }
  ]);

})(window);