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

/**
 * MProductFeatures
 *
 * This class contains functions to add, edit and delete the product features
 * at the admin side.
 * @package		Model_MProductFeatures
 * @category	Model
 * @author		ZeusCart Team
 * @link		http://www.zeuscart.com
 * @version 	2.3
 */

// ------------------------------------------------------------------------



class Model_MProductFeatures
{
	/**
	 * Stores the output
	 *
	 * @var array $output
	 */	
	var $output = array();	
	
	/**
	 * Function displays the list of features available for a product 
	 * 
	 * 
	 * @return array
	 */
	function dispProductFeatures()
	{
		include('classes/Core/CRoleChecking.php');
		$chkuser=Core_CRoleChecking::checkRoles();
		if($chkuser)
		{
			include('classes/Core/CProductFeatures.php');
			include('classes/Display/DProductFeatures.php');
			include('classes/Core/CAdminHome.php');			
			$output['productfeatures'] =   Core_CProductFeatures::dispProductFeatures();	
			$output['monthlyorders']= (int)Core_CAdminHome::monthlyOrders();
			$output['previousmonthorders']=(int)Core_CAdminHome::previousMonthOrders();
			$output['totalorders']=(int)Core_CAdminHome::totalOrders();
			
			
			$output['currentmonthuser']=(int)Core_CAdminHome::currentMonthUser();
			$output['previousmonthuser']=(int)Core_CAdminHome::previousMonthUser();
			$output['totalusers']=(int)Core_CAdminHome::totalUsers();
			
			$output['currentmonthincome']=Core_CAdminHome::currentMonthIncome();
			$output['previousmonthincome']=Core_CAdminHome::previoustMonthIncome();
			$output['totalincome']=Core_CAdminHome::totalIncome();
			
			$output['currentmonthproudctquantity']=(int)Core_CAdminHome::currentMonthProudctQuantity();
			$output['previousmonthproudctquantity']=(int)Core_CAdminHome::previousMonthProudctQuantity();
			$output['totalproudctquantity']=(int)Core_CAdminHome::totalProudctQuantity();
			
		
			$output['lowstock']=Core_CAdminHome::lowStock();
			
			
			
			
			$output['totalproducts']=Core_CAdminHome::totalProducts();		
			$output['enabledproducts']=Core_CAdminHome::enabledProducts();
			$output['disabledproducts']=Core_CAdminHome::disabledProducts();
			$output['pendingorders']=(int)Core_CAdminHome::pendingOrders();
		$output['processingorders']=(int)Core_CAdminHome::processingOrders();
		$output['deliveredorders']=(int)Core_CAdminHome::deliveredOrders();
			
			
						
			Bin_Template::createTemplate('ProductFeatures.html',$output);
		}
		else
		{
			$output['usererr'] = 'You are Not having Privilege to view this page contact your Admin for detail';
			Bin_Template::createTemplate('Errors.html',$output);
		}
	}	
	
	/**
	 * Function adds a new  product feature
	 * 
	 * 
	 * @return array
	 */
	
	function insertProductFeatures()
	{
		include('classes/Core/CProductFeatures.php');
		include('classes/Display/DProductFeatures.php');
		include('classes/Core/CRoleChecking.php');
		$chkuser=Core_CRoleChecking::checkRoles();
		if($chkuser)
		{
			Core_CProductFeatures::insertProductFeatures();
			//$id=$_GET['id'];		
		    //header("Location:?do=productfeatures=".$id);
		  	//exit;
		}
		else
		{
			$output['usererr'] = 'You are Not having Privilege to view this page contact your Admin for detail';
			Bin_Template::createTemplate('Errors.html',$output);
		}
	
	}
	
	/**
	 * Function updates the exisiting product features
	 * 
	 * 
	 * @return array
	 */
	
	function updateProductFeatures()
	{
		include('classes/Core/CProductFeatures.php');
		include('classes/Display/DProductFeatures.php');	
		include('classes/Core/CRoleChecking.php');
		$chkuser=Core_CRoleChecking::checkRoles();
		if($chkuser)
		{
			Core_CProductFeatures::updateProductFeatures();
			header("Location:?do=productfeatures");
		  	exit;
		}
		else
		{
			$output['usererr'] = 'You are Not having Privilege to view this page contact your Admin for detail';
			Bin_Template::createTemplate('Errors.html',$output);
		}
	}
	
	/**
	 * Function deletes the existing product features available 
	 * 
	 * 
	 * @return array
	 */
	
	function deleteProductFeatures()
	{
		include('classes/Core/CProductFeatures.php');
		include('classes/Display/DProductFeatures.php');	
		include('classes/Core/CRoleChecking.php');
		$chkuser=Core_CRoleChecking::checkRoles();
		if($chkuser)
		{
		    Core_CProductFeatures::deleteProductFeatures();
			header("Location:?do=productfeatures");
		  	exit;
		}
		else
		{
			$output['usererr'] = 'You are Not having Privilege to view this page contact your Admin for detail';
			Bin_Template::createTemplate('Errors.html',$output);
		}
	}
	
}
?>