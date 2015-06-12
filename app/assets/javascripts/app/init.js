$(document).ready(function () {
  $.get('/me', function (user) {
    window.user = user;
    angular.bootstrap(document, ['Uniq']);
  });
});