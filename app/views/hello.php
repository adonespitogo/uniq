<!doctype html>
<html lang="en" ng-app="Uniq">
<head>
  <meta charset="UTF-8">
  <title ng-bind="title"></title>

  <?= stylesheet_link_tag() ?>
  <?= javascript_include_tag() ?>

</head>
<body>
  <div ui-view></div>
</body>
</html>
