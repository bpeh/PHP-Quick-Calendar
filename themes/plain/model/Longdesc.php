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

require_once(QCALENDAR_SYS_PATH.'/QCalendarLongdesc.php');

// model for longdesc

class LongdescPlain extends QCalendarLongDesc {

	function LongdescPlain($view, $theme) {
		$count = count($view['hr']);
		for ($i = 0; $i < $count; $i++) {
			// format time the right way
			$view['hr'][$i] = ($view['hr'][$i] < 10) ? '0'.$view['hr'][$i] : $view['hr'][$i];
			$view['min'][$i] = ($view['min'][$i] < 10) ? '0'.$view['min'][$i] : $view['min'][$i];
		}
		parent::QCalendarLongDesc($view, $theme);
	}
}

