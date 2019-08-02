<?php
require '../../site/use/site.php';
$view = new CL\Site\Doc\DocView($site);
$view->title = 'cl/survey';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="../../../../cl/site.css" type="text/css" rel="stylesheet" />
<?php echo $view->head(); ?>
</head>

<body>
<?php echo $view->header(); ?>

<p>The cl/survey component adds the ability to conduct surveys to a course.</p>

<ul>
    <li><a class="cl-autoback" href="install.php">Installation and Configuration</a></li>
</ul>

<?php echo $view->footer(); ?>
</body>
</html>
