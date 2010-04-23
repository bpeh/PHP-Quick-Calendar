<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Demo theme - Two Column Calendar</title>

</head>

<body>

<h2>PHP Quick Calender Demo - Two Column</h2>
<p>Displays the whole month in two columns. Good for events planning. If you are using the latest firefox or safari, you see see the CSS3 curved borders...yay!</p>
<?php
require_once('../../controller.php');
$cssCalendar='float:left';
$cssLongDesc='width:400px;overflow:auto;z-index:10;position:absolute;border:1px solid #0066FF; background-color:#FFFFFF; visibility:hidden;';
// configure calendar theme
initQCalendar('twocolumn','qCalendarTwoColumn', $cssCalendar, 'myContentTwoColumn', $cssLongDesc, 0, 0, 0, 0, 0);
?>

</body>
</html>
