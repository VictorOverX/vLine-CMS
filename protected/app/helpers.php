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

	/**
	 * Perfect function to serialize and unserialize
	 *
	 */
	if (!function_exists('perfectSerialize')) {
	    function perfectSerialize($string) {
	        return base64_encode(serialize($string));
	    }
	}

	if (!function_exists('perfectUnserialize')) {
	    function perfectUnserialize($string) {

	        if (base64_decode($string, true) == true) {

	            return unserialize(base64_decode($string));
	        } else {
	            return @unserialize($string);
	        }
	    }
	}

	if (!function_exists('sanitizeText')) {
	    function sanitizeText($string, $limit = false) {

	        if (!is_string($string)) return $string;
	        $string = lawedContent($string);//great one
	        $string = trim($string);
	        $string = str_replace('<','&#60;',$string);
	        $string = str_replace('>','&#62;',$string);
	        $string = str_replace("'",'&#39;',$string);
	        $string = htmlspecialchars($string);
	        $string = str_replace('\\r\\n','<br>',$string);
	        $string = str_replace('\\n\\n','<br>',$string);
	        $string = stripslashes($string);
	        $string = str_replace('&amp;#','&#',$string);

	        if ($limit) {
	            $string = substr($string, 0, $limit);
	        }
	        return $string;
	    }
	}

	function parseVimeo($link)
	{
	    $link = str_replace('http://www.','', $link);
	    $link = str_replace('http://','', $link);
	    $link = str_replace('https://','', $link);
	    $link = str_replace('www.','', $link);
	    //$link = str_replace('https://wwww.','', $link);

	    //echo $link;

	    if(preg_match('#vimeo.com\/[a-zA-Z0-9\-\_]#', $link))
	    {
	        if (preg_match('#player.vimeo#', $link)) return 'http://'.$link;

	        //return true;
	        $link = str_replace('vimeo.com/','vimeo.com/video/',$link);
	        $link = 'http://player.'.$link;

	        return $link;
	    }
	    return false;
	}

	function parseYouTube($link)
	{
	    if(preg_match("#embed#", $link)) return $link;

	    //this take care of youtube link like this http://youtu.be/awerqwouioqw
	    if(preg_match('#http://#', $link))
	    {
	        if(preg_match('#http://youtu.be#', $link))
	        {
	            $link = str_replace('http://youtu.be', 'http://www.youtu.be', $link);

	        }elseif( preg_match('#http://youtube.com#', $link))
	        {
	            $link = str_replace('http://youtube.com', 'http://www.youtube.com', $link);
	        }

	        if(preg_match("#http:\/\/youtu.be\/[a-zA-Z0-9\-\_\.]+#", $link, $matchs))
	        {
	            return 'http://www.youtube.com/embed/'.str_replace("http://youtu.be/",'', $link);
	        }

	        //this take care of youtube http://youtube.com/watch?v=dfkjsdfhsdjk
	        if(preg_match("#http:\/\/www.youtube.com\/watch\?v\=[a-zA-Z0-9\-\_\.]+#", $link, $matchs))
	        {
	            return 'http://www.youtube.com/embed/'.str_replace("http://www.youtube.com/watch?v=",'', $link);
	        }

	    }elseif(preg_match('#https://#', $link))
	    {
	        if(preg_match('#https://youtu.be#', $link))
	        {
	            $link = str_replace('https://youtu.be', 'https://www.youtu.be', $link);

	        }elseif( preg_match('#https://youtube.com#', $link))
	        {
	            $link = str_replace('https://youtube.com', 'https://www.youtube.com', $link);
	        }

	        if(preg_match("#https:\/\/www.youtu.be\/[a-zA-Z0-9\-\_\.]+#", $link, $matchs))
	        {
	            return 'https://www.youtube.com/embed/'.str_replace("https://www.youtu.be/",'', $link);
	        }

	        //this take care of youtube http://youtube.com/watch?v=dfkjsdfhsdjk
	        if(preg_match("#https:\/\/www.youtube.com\/watch\?v\=[a-zA-Z0-9\-\_\.]+#", $link, $matchs))
	        {

	            return 'https://www.youtube.com/embed/'.str_replace("https://www.youtube.com/watch?v=",'', $link);
	        }
	    }

	    return false;
	}

	/**
    * VIDEO ID
    * Pega o ID da URL
    **/
    function VideoID($url){

        if(strpos($url, "vimeo.com")){
            if(strpos($url, 'vimeo.com/')){
                $val = strrpos($url, 'vimeo.com/')+10;
                $str = substr($url, $val);
               return '<iframe src="https://player.vimeo.com/video/'.$str.'" width="854" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            } 
        }else if(strpos($url, "youtube.com")){
            if(strpos($url, '?v=')){
                $val = strrpos($url, '?v=')+3;
                $str = substr($url, $val);
               return '<iframe width="854" height="480" src="https://www.youtube.com/embed/'.$str.'" frameborder="0" allowfullscreen></iframe>';
            } 
        }
    }