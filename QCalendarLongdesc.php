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

/*
 * The Long Desc Class
 * 
 * Master class for long desc
 *
 */
class QCalendarLongdesc {

	// theme
	var $theme;
	
	// view variables
	var $view;
	
	// css
	var $css;
	
	// constructor
	function QCalendarLongdesc($view, $theme) {
		$this->theme = $theme;
		$view['QCALENDAR_SYS_PATH'] = QCALENDAR_SYS_PATH;
		$view['QCALENDAR_WEB_PATH'] = QCALENDAR_WEB_PATH;
		$this->css = $theme.'_longdesc';
		$view['css'] = $this->css;
		$this->view = $view;
	}
	
	function render() {
		require_once(QCALENDAR_SYS_PATH.'/QCalendarView.php');
		new QCalendarView($this->view, $this->theme, 'longdesc.phtml');
	}
}

