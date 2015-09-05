<?php

namespace App\Library;
/**
 * Date.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 * 
 * @copyright (c) 2014, Victor M. Salatiel LINEXTI TECNOLOGIA
 */

class DateHelpers {

    private static $Data;
    private static $Format;

    /**
     * <b>Tranforma Data:</b> Transforma uma data no formato DD/MM/YY em uma data no formato TIMESTAMP!
     * @param STRING $Name = Data em (d/m/Y) ou (d/m/Y H:i:s)
     * @return STRING = $Data = Data no formato timestamp!
     */
    public static function timeStamp($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (empty(self::$Format[1])):
            self::$Format[1] = date('H:i:s');
        endif;

        self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
        return self::$Data;
    }

    /**
     * 
     * @param type $data
     * @param type $formato
     * @return Date
     * @tutorial exemplo de uso echo data("2011-11-10 16:59:00"); // 10/11/2011
     * echo data("2011-11-14 00:00:01"); // Hoje às 00:00
     * echo data("2011-11-13 15:00:00",24); // Ontem às 03:00 PM
     * echo data("2011-11-15 12:20:00"); // Amanha às 12:20
     */
    public static function dataBR($data, $formato = 12) {
        $hora = $formato == 12 ? "h" : "H";
        $am_pm = (date("H", strtotime($data)) < 12) ? " AM" : " PM";
        $am_pm = $formato == 24 ? "" : $am_pm;
        if (date('d/m/Y', strtotime($data)) == date('d/m/Y')) {
            return "Hoje às " . date("$hora:i", strtotime($data)) . $am_pm;
        } else if (date('m/Y', strtotime($data)) == date('m/Y') && date("d", strtotime($data)) == date("d") - 1) {
            return "Ontem às " . date("$hora:i", strtotime($data)) . $am_pm;
        } else if (date('m/Y', strtotime($data)) == date('m/Y') && date("d", strtotime($data)) == date("d") + 1) {
            return "Amanha às " . date("$hora:i", strtotime($data)) . $am_pm;
        } else {
            return date("d/m/Y", strtotime($data));
        }
    }

    /**
     * <b>AjusteTempo:</b> Estiliza o tempo enviado para o sistema, e resulta em hora, minutos segundos atrás
     * @tutorial Você precisa colocar o valor do banco de dados no formato timestamp exemplo  "Data::AjusteTempo("2014-05-10 00:51:53")"
     * @return STRING retorna o valor em texto
     */
    public static function AjusteTempo($date) {
        if (empty($date)) {
            return "Sem data prevista";
        }

        $periods = array("segundo", "minuto", "hora", "dia", "semana", "mês", "ano", "década");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();
        $unix_date = strtotime($date);

        // Verificar a validade da data
        if (empty($unix_date)) :
            return "Data ruim";
        endif;

        // É data futura ou data passada
        if ($now > $unix_date) :
            $difference = $now - $unix_date;
            $tense = "atrás";
        else:
            $difference = $unix_date - $now;
            $tense = "de agora";
        endif;

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) :
            $difference /= $lengths[$j];
        endfor;

        $difference = round($difference);

        if ($difference != 1) :
            if ($j == 5):
                $periods[$j].= "es";
            else:
                $periods[$j].= "s";
            endif;

        endif;

        return "$difference $periods[$j] {$tense}";
    }

    /**
     * <b>data_info:</b> Formata a Data
     * @tutorial Você precisa colocar o valor em letras que significa o resultado, por exp:
     * @tutorial Date::data_info('Y'); Representa o Ano no formato 2014
     * @tutorial Date::data_info('D'); Representa o Data no formato 10/10/14
     * @tutorial Date::data_info('H'); Representa a Hora
     * @tutorial Date::data_info('S'); Representa a Semana no formato texto  Domingo, 6 de Julho de 2014
     * @return STRING retorna o valor em texto
     */
    public static function data_info($retorno) {

        self::$Data = $retorno;

        $dia = date("j") - 1;
        $hora = date("H") - 3;
        $minuto = date("i");
        $segundo = date("s");

        $semana = array(0 => "Domingo", 1 => "Segunda", 2 => "Terça", 3 => "Quarta", 4 => "Quinta", 5 => "Sexta", 6 => "Sábado");
        $mes = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

        if(self::$Data == 'Y'):
            return $ano = date("Y");
        elseif(self::$Data == 'D'):
            return $data_completa = date("d/m/y");
        elseif(self::$Data == 'H'):
            return $hora_completa = $hora . ":" . $minuto . ":" . $segundo;
        elseif(self::$Data == 'S'):
            return $misc = $semana[date("w")] . ", " . date("j") . " de " . $mes[date("n")] . " de " . date("Y");
        endif;       
        
    }

    /**
    * <b>DataPTBR:</b> Exibe datas em nomes
    * @param STRING DataPTBR = 
    * @return STRING = True para um email válido, ou false
    *  @tutorial 
    * $mes = date('n');
    * $diaSemana= date('w');
    * $ano = date('Y');
    * $diaMes = date('d');
    */
    public static function DataPTBR($dia = NULL, $mes = NULL, $mesesg = NULL) {
        if($dia != NULL):
                $semana = array(
                    0   =>  "Dom", 
                    1   =>  "Seg", 
                    2   =>  "Ter",
                    3   =>  "Qua", 
                    4   =>  "Qui", 
                    5   =>  "Sex", 
                    6   =>  "Sáb"
                );
                return $semana[$dia];
            elseif($mes != NULL):
                $Meses = array(
                    1   =>  "Jan",
                    2   =>  "Fev",
                    3   =>  "Mar",
                    4   =>  "Abr",
                    5   =>  "Mai",
                    6   =>  "Jun",
                    7   =>  "Jul",
                    8   =>  "Ago",
                    9   =>  "Set",
                    10  =>  "Out",
                    11  =>  "Nov",
                    12  =>  "Dez");
                return $Meses[$mes];   
            elseif($mesesg != NULL):
                $MesesG = array(
                    1   => "Janeiro", 
                    2   => "Fevereiro", 
                    3   => "Março", 
                    4   => "Abril", 
                    5   => "Maio", 
                    6   => "Junho", 
                    7   => "Julho", 
                    8   => "Agosto", 
                    9   => "Setembro", 
                    10  => "Outubro", 
                    11  => "Novembro", 
                    12  => "Dezembro");
                return $MesesG[$mesesg];   
        endif;
    }
}