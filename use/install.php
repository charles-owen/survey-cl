<?php
require '../../site/use/site.php';
$view = new CL\Site\Doc\DocView($site);
$view->title = 'cl/survey installation';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../../../../cl/site.css" type="text/css" rel="stylesheet" />
<?php echo $view->head(); ?>
</head>

<body>
<?php echo $view->header(); ?>
<?php echo Backto::to("cl/survey", "./"); ?>


<p>The cl/survey component assumed a configured course and is dependent on cl/source. To add survey capabilities to a site, use composer to install the cl/survey component:</p>

<pre class="code">composer require cl/survey
composer run cl-installer</pre>

	
<aside>The cl/setup/tables URL can be used at any time to ensure all 
required tables are created. It will not delete or modify any existing
tables, but will install any tables that are currently missing.</aside>
	
<p>The <code>composer run cl-installer</code> command runs a script that installs the component in the
system. It must be run any time a new component is added.</p>



<p>To get the initial tables created, browse to the URL (relative to the 
site root):</p>

<p class="center"><code>cl/setup/tables</code></p>
<p>For example, if the site URL is https://www.example.com/site, the URL to create the tables will be https://www.example.com/site/cl/setup/tables.</p>

<?php echo Backto::to("cl/survey", "./"); ?>
<?php echo $view->footer(); ?>
</body>
</html>
