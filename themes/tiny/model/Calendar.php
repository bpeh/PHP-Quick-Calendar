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

require_once(QCALENDAR_SYS_PATH.'/QCalendarBase.php');

class QCalendarTiny extends QCalendarBase {

	// uses parent constructor by default
	
	/**
	 * Overwrite parent header for the calendar.
	 */
	function createHeader() {
		// register default header view var
		parent::createHeader();
	}
	
	/**
	 * Overwrite parent html body. This is the main bulk of the logic. modify at your own risks.
	 */
	function createBody(){
		
		// start the week from Mon
		$this->fillArray(1);
		
		// start rendering table
		for($i=0;$i<$this->weeksInMonth;$i++) {
			for ($j=0;$j<7;$j++) {
				
				// check if if is today
				if (($this->today['day'] == $this->cell[$i][$j]['value']) && ($this->today['month'] == $this->month) && ($this->today['year'] == $this->year)) {
					$this->cell[$i][$j]['isToday'] = 1;
				}
				// else normal day
				else {
					$this->cell[$i][$j]['isToday'] = 0;
				}
				// init defaults
				$this->cell[$i][$j]['link'] = 'none';
				$this->cell[$i][$j]['day'] = $this->cell[$i][$j]['value'];
								
				// if days with link
				foreach ($this->links as $val) {
					if (($val['day'] == $this->cell[$i][$j]['value']) && (($val['month'] == $this->month) || ($val['month'] == '*')) && (($val['year'] == $this->year) || ($val['year'] == '*'))) {
								$this->cell[$i][$j]['day'] = "<a href=\"javascript:;\" title=\"{$val['short_desc']}\">{$this->cell[$i][$j]['value']}</a>";
								$this->cell[$i][$j]['link'] = 'div';
								break;
					}
				}					
			}
		}	
		// register default body view var
		parent::createBody();
		$view = array();
		$view['cell'] = $this->cell;
		$this->registerView($view);
	}
	
	/**
	 * Overwrite parent html footer.
	 */
	function createFooter() {
		// no footer for now.
	}
}

