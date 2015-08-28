<?php 

	function layoutBase($value)
	{
	    return \URL::to('protected/resources/views/themes/linexti/assets/' . $value);
	}

	function urlBase($value)
	{
		return \URL::to($value);
	}
