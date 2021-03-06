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

// if user deletes
if (isset($_GET['del'])) {
	$sql = "delete from ".QCALENDAR_CAT_TABLE." where id='".$_GET['id']."'";
	mysql_query($sql) or die(mysql_error());
	// update calendar table category id to 0
	$sql = "update ".QCALENDAR_TABLE." set category_id='0' where id='".$_GET['id']."'";
	mysql_query($sql) or die(mysql_error());
	exit("Entry #".$_GET['id']." deleted. <a href=\"category.php\">back to category.</a>");
}
// del short desc image
if (isset($_GET['delshortimage'])) {
	// get file link
	$sql = "select short_desc_image from ".QCALENDAR_CAT_TABLE." where id='".$_GET['id']."'";
	$rs = mysql_query($sql) or die(mysql_error());
	extract(mysql_fetch_assoc($rs));
	// delete file
	unlink(QCALENDAR_SYS_PATH.$short_desc_image);
	// remove from db
	$sql = "update ".QCALENDAR_CAT_TABLE." set short_desc_image='' where id='".$_GET['id']."'";
	mysql_query($sql) or die(mysql_error());
	exit("Entry #".$_GET['id']." updated. <a href=\"category.php\">back to category.</a>");
}
// del long desc image
if (isset($_GET['dellongimage'])) {
	// get file link
	$sql = "select long_desc_image from ".QCALENDAR_CAT_TABLE." where id='".$_GET['id']."'";
	$rs = mysql_query($sql) or die(mysql_error());
	extract(mysql_fetch_assoc($rs));
	// delete file
	unlink(QCALENDAR_SYS_PATH.$long_desc_image);
	// remove from db
	$sql = "update ".QCALENDAR_CAT_TABLE." set long_desc_image='' where id='".$_GET['id']."'";
	mysql_query($sql) or die(mysql_error());
	exit("Entry #".$_GET['id']." updated. <a href=\"category.php\">back to category.</a>");
}
// if user updates
else if (isset($_POST['update']) && isset($_POST['id'])) {
	array_map('addslashes', $_POST);
	extract($_POST);
	if ($_FILES['short_desc_image']['name'] != '') {
		$image_path = '/upload/'.date("Ymds").'_'.$_FILES['short_desc_image']['name'];
		$short_desc_image = $image_path;
		if (!move_uploaded_file($_FILES['short_desc_image']['tmp_name'], QCALENDAR_SYS_PATH.$image_path)) {
			exit("error uploading {$_FILES['short_desc_image']['name']}");
		}
	}
	else {
		$rs = mysql_query("select short_desc_image from ".QCALENDAR_CAT_TABLE." where id='{$_POST['id']}'");
		$rw = mysql_fetch_assoc($rs);
		$short_desc_image = $rw['short_desc_image'];
	}
	
	if ($_FILES['long_desc_image']['name'] != '') {
		$image_path = '/upload/'.date("Ymds").'_'.$_FILES['long_desc_image']['name'];
		$long_desc_image = $image_path;
		if (!move_uploaded_file($_FILES['long_desc_image']['tmp_name'], QCALENDAR_SYS_PATH.$image_path)) {
			exit("error uploading {$_FILES['long_desc_image']['name']}");
		}
	}
	else {
		$rs = mysql_query("select long_desc_image from ".QCALENDAR_CAT_TABLE." where id='{$_POST['id']}'");
		$rw = mysql_fetch_assoc($rs);
		$long_desc_image = $rw['long_desc_image'];
	}
	$sql = "Update ".QCALENDAR_CAT_TABLE." set short_desc='$short_desc', long_desc='$long_desc', short_desc_image='$short_desc_image', long_desc_image='$long_desc_image',  active='$active' where id='{$_POST['id']}'";
	mysql_query($sql) or die(mysql_error());
	exit("Entry updated. <a href=\"category.php\">back to category.</a>");
}
// if user adds new entry
else if (isset($_POST['add'])) {
	array_map('addslashes', $_POST);
	extract($_POST);
	if ($_FILES['short_desc_image']['name'] != '') {
		$image_path = '/upload/'.date("Ymds").'_'.$_FILES['short_desc_image']['name'];
		$short_desc_image = $image_path;
		if (!move_uploaded_file($_FILES['short_desc_image']['tmp_name'], QCALENDAR_SYS_PATH.$image_path)) {
			exit("error uploading {$_FILES['short_desc_image']['name']}");
		}
	}
	if ($_FILES['long_desc_image']['name'] != '') {
		$image_path = '/upload/'.date("Ymds").'_'.$_FILES['long_desc_image']['name'];
		$long_desc_image = $image_path;
		if (!move_uploaded_file($_FILES['long_desc_image']['tmp_name'], QCALENDAR_SYS_PATH.$image_path)) {
			exit("error uploading {$_FILES['long_desc_image']['name']}");
		}
	}
	$sql = "Insert into ".QCALENDAR_CAT_TABLE." (short_desc, long_desc, short_desc_image, long_desc_image, active) values ('$short_desc', '$long_desc', '$short_desc_image', '$long_desc_image', '$active')";
	mysql_query($sql) or die(mysql_error());
	exit("New entry added. <a href=\"category.php\">back to category.</a>");
}

// extract user details if user update
if (isset($_GET['id'])) {
	$sql = "select * from ".QCALENDAR_CAT_TABLE." where id='".$_GET['id']."'";
	$rs = mysql_query($sql) or die(mysql_error());
	extract(mysql_fetch_assoc($rs));
	echo "<h2>Update Category #$id</h2>";
}
?>

<!-- you may want to verify the input details -->

<form name="form1" method="post" action="" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
Short Desc (HTML):<br/> <textarea name="short_desc"><?php echo $short_desc; ?></textarea>
<br/><br/>
Long Desc (HTML):<br/> <textarea name="long_desc" style="width:400; height:200px;overflow:auto;"><?php echo $long_desc; ?></textarea>
<br/><br/>
Short Desc Image: <input type="file" name="short_desc_image" />
<br/><br/>
<?php 
if ($short_desc_image != '') {
	echo "<br/><img src='".QCALENDAR_WEB_PATH."$short_desc_image'/><a href=\"?delshortimage&id={$_GET['id']}\">del</a>";
}
?>
<br/><br/>
Long Desc Image: <input type="file" name="long_desc_image" />
<br/><br/>
<?php 
if ($long_desc_image != '') {
	echo "<br/><img src='".QCALENDAR_WEB_PATH."$long_desc_image'/><a href=\"?dellongimage&id={$_GET['id']}\">del</a>";
}
?>
<br/><br/>
Active: <select name="active">
<option value='1' <?php if ($active=='1') {echo 'selected';} ?>>Yes</option>
<option value='0' <?php if ($active=='0') {echo 'selected';} ?>>No</option>
</select>
<br/><br/>
<?php
// if updating entries
if (isset($_GET['id'])) {
	echo "<input type='submit' name='update' value='Update'>";
}
// adding new entries
else {
	echo "<input type='submit' name='add' value='Add'>";
}
?>
</form>
<p>
Click <a href="http://web-developer.sitecritic.net/2009/01/08/installing-quick-calendar/" target="_blank">here</a> to see what the fields above mean.
</p>
