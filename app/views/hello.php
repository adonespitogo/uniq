<!doctype html>
<html lang="en" ng-app="Uniq">
<head>
  <meta charset="UTF-8">
  <title ng-bind="title"></title>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <meta name="viewport" content="initial-scale=1" />
  <?= stylesheet_link_tag() ?>
</head>
<body>
  <div ui-view></div>

  <?= javascript_include_tag() ?>
</body>
</html>
