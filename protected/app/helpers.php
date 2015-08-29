<?php 

	function layoutBase($value)
	{
	    return \URL::to('protected/resources/views/themes/linexti/assets/' . $value);
	}

	function urlBase($value)
	{
		return \URL::to($value);
	}

	function nivelStatus($value)
	{
		switch ($value) {
			case '1':
				return 'Usuário';
				break;
			
			case '2':
				return 'Moderador';
				break;

			case '3':
				return 'Administrador';
				break;
		}
	}
