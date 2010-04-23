<?php

/*
   Copyright 2009 Bernard Peh

   This file is part of PHP Quick Calendar.

   PHP Quick Calendar is free software: you can redistribute it and/or modify
   it under the terms of the GNU LESSER GENERAL PUBLIC LICENSE as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   PHP Quick Calendar is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU LESSER GENERAL PUBLIC LICENSE for more details.

   You should have received a copy of the GNU LESSER GENERAL PUBLIC LICENSE
   along with PHP Quick Calendar.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once('../config.php');

/*
this is a very draft admin panel for users who do not have enough programming knowledge or lazy to do one for themselves. Some logic are repeated. so a cleanup might be necessary in the next version. Feel free to improve on it. One good idea is to add pagination, fields and user verification. There is no user authentication to administer this page for now. user may integrate this page into their existing cms or password protect this page in anyway they like.
*/

echo "<h2>PHP Quick Calendar Admin</h2>";
require_once('nav.php');
echo "<table border='1'><th>Id</th><th>Hrs</th><th>Mins</th><th>Day</th><th>Month</th><th>Year</th><th>Link</th><th>URL</th><th>Short Desc</th><th>Long Desc</th><th>Active</th><th>Edit</th><th>Delete</th>";
$sql = "SELECT * FROM ".QCALENDAR_TABLE;
	$rs = mysql_query($sql);
	while ($rw = mysql_fetch_assoc($rs)) {
		extract($rw);
		echo "<tr>";
		echo "<td>$id</td><td>$hr</td><td>$min</td><td>$day</td><td>$month</td><td>$year</td><td>$link</td><td>$url</td><td>";
		if (strlen($short_desc) > 15) {
			$short_desc = substr($short_desc,0,15).'...';
		}
		echo "$short_desc</td><td>";
		if (strlen($long_desc) > 20) {
			$long_desc = substr($long_desc,0,20).'...';
		}
		echo "$long_desc</td><td>$active</td><td><a href='calendar_update.php?id=$id'>edit</a></td><td><a href='calendar_update.php?del&id=$id'>del</a></td>";
		echo "</tr>";
	}
echo "</table>";
