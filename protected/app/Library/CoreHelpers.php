<?php
namespace App\Library;

class CoreHelpers{

	public static function Ativate($url, $valor) {
        $ativate = '';

        if (is_array($url)):
            $ativate = (in_array(\Request::path(), $url) ? $valor : '');
        else:
            $ativate = (\Request::path() == $url ? $valor : '');
        endif;
        return $ativate;
    }


}