$(document).ready(function () {
  $.get('/me').success(function (user) {
    window.user = user;
    angular.bootstrap(document, ['Uniq']);
  })
  .fail(function(){
    window.location = '/users/login'
  });
});