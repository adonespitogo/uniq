(function () {

  App.service('Event', ['$resource', function ($resource) {

    return $resource('/events/:id', {id: '@id'}, {
      put: {
        method: 'PUT'
      }
    });

  }]);

}).call(this);