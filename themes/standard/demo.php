<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>Demo theme - Standard Calendar</title>

</head>

<body>

<h2>PHP Quick Calender Demo - Large Standard Calendar</h2>
<p>Gives an overview of events and happenings in a month.</p>
<?php
require_once('../../controller.php');
$cssCalendar='float:left;margin-left:40px;';
$cssLongDesc='float:right;padding-left:20px;width:300px';
initQCalendar('standard','qCalendarStandard', $cssCalendar, 'myContentStandard', $cssLongDesc, 0,0,0,0,0);
?>

</body>
</html>
