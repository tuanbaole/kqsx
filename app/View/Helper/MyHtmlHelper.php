<?php
App::uses('HtmlHelper', 'View/Helper');

class MyHtmlHelper extends HtmlHelper {

	public function conver_number($number)
	{
		if (strlen($number) == 1) 
		{
			$result = sprintf("%02d", $number);
		} 
		else
		{
			$result = $number;
		}  
		return $result;
	}

}