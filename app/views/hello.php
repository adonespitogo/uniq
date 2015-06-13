<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title ng-bind="title"></title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <meta name="viewport" content="initial-scale=1" />
  <?= stylesheet_link_tag() ?>
</head>
<body>
  <div ui-view></div>

  <?= javascript_include_tag() ?>
</body>
</html>
