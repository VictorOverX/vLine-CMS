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

    public static function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
    {
		// Caracteres de cada tipo
    	$lmin 	= 'abcdefghijklmnopqrstuvwxyz';
    	$lmai 	= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$num 	= '1234567890';
    	$simb 	= '!@#$%*-';
		// Variáveis internas
    	$retorno 	= '';
    	$caracteres = '';
		// Agrupamos todos os caracteres que poderão ser utilizados
    	$caracteres .= $lmin;
    	if ($maiusculas) $caracteres .= $lmai;
    	if ($numeros) $caracteres .= $num;
    	if ($simbolos) $caracteres .= $simb;
		// Calculamos o total de caracteres possíveis
    	$len = strlen($caracteres);
    	for ($n = 1; $n <= $tamanho; $n++) {
			// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
    		$rand = mt_rand(1, $len);
			// Concatenamos um dos caracteres na variável $retorno
    		$retorno .= $caracteres[$rand-1];
    	}
    	return $retorno;
    }


}