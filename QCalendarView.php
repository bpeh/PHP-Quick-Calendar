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
 * The View Class
 * 
 * Accepts the view array and display html.
 *
 */
class QCalendarView {
	
	// view var
	var $view;
	
	/**
	 * The constructor 
	 *
	 * The constructor initialises the calendar.
	 *
	 */
	function QCalendarView($view, $theme, $file) {
		$this->view = $view;
		extract($view);
		// the view vars is now available for use in the template
		// in the template, print_r($this->view) to see all variables available
		require(QCALENDAR_SYS_PATH."/themes/$theme/view/$file");
	}
}

