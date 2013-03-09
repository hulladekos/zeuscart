<?php
/**
* GNU General Public License.

* This file is part of ZeusCart V2.3.

* ZeusCart V2.3 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* ZeusCart V2.3 is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Foobar. If not, see <http://www.gnu.org/licenses/>.
*
*/

class Model_MPolls
{
	var $output = array();
	
	function showPollsPage()
	{
		include('classes/Core/CPolls.php');
		include('classes/Display/DPolls.php');
		
		$output['pollList'] =   Core_CPolls::showPolls();
		$output['popularTopics'] = Core_CPolls::showTopics();
		$output['catList'] = Core_CPolls::showCategories();
		
		Bin_Template::createTemplate('polls.html',$output);
	}
}



?>