<?php

if(!function_exists('carbon_format'))
{
	function carbon_format($date, $format = 'Y-m-d')
	{
		if(!is_null($date)){
			$date = \Carbon\Carbon::parse($date)->format($format);
			return $date;
		}else{
			return null;
		}
	}
}