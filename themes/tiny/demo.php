<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Demo theme - Tiny Calendar</title>
</head>

<body>
<h2>PHP Quick Calender Demo - Tiny Calendar</h2>
<p>Really small calendar. Only hightlight days when there are events.</p>
<?php
require_once('../../controller.php');
$cssCalendar= 'float:left;border: 1px solid #efefef;';
$cssLongDesc='';
// configure calendar theme
initQCalendar('tiny','qCalendarPlain', $cssCalendar, 'qCalendarLongDesc', $cssLongDesc, 0, 0, 0, 0, 0);
?>
</body>
</html>
