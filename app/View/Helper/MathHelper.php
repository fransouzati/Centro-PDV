<?php
App::uses('AppHelper', 'View/Helper');

class MathHelper extends AppHelper {

	public $helpers = array('Html'); // Helper dentro de outro

	public function diferencaDeDatas($dInicio, $dFim, $dFormato = null){
		$inicio = $dInicio;
		$fim = $dFim;
		$formato = $dFormato;

		// Converte as datas para objetos DateTime do PHP
		// PARA O PHP 5.3 OU SUPERIOR
		$inicio = DateTime::createFromFormat('d/m/Y', $inicio);

		//PARA O PHP 5.2
		// $inicio = date_create_from_format('d/m/Y H:i:s', $inicio);

		$fim = DateTime::createFromFormat('d/m/Y', $fim);
		// $fim = date_create_from_format('d/m/Y H:i:s', $fim);

		// Calcula a diferença entre as duas datas
		$intervalo = $inicio->diff($fim);

		switch ($formato) {
			case 'dias':
				//return $intervalo->format('%a');
				break;

			default:
				// Imprime a diferença entre as duas
				// datas de modo formatado
				return $intervalo->format(
				    'A diferença entre as datas é de %Y ano(s), %M mese(s),
				    %D dia(s), %H hora(s), %I minuto(s) e %S segundo(s).
				    No geral, é um pouco mais de %a dias.');
				break;
		}
	}

	public function escreveData($data){
        $var = explode('/', $data);
        $novadata = $var[1] . '/' . $var[0] . '/' . $var[2];
        return $novadata;
    }

    public function converteData($data, $to){

    	switch ($to) {
    		case 'br':
    			$var = explode('/', $data);
		        $novadata = $var[1] . '/' . $var[0] . '/' . $var[2];
		        return $novadata;
    			break;
    		case 'us':
    			$var = explode('/', $data);
		        $novadata = $var[2] . '-' . $var[0] . '-' . $var[1];
		        return $novadata;
    			break;
    		default:
    			$var = explode('/', $data);
		        $novadata = $var[1] . '/' . $var[0] . '/' . $var[2];
		        return $novadata;
    			break;
    	}

    }

    public function comparaData($data1, $data2){

    	//$data1 = date('Y-m-d');
		//$data2 = '2013-05-22';
    	if (strtotime($data1) > strtotime($data2)) {
    		//echo 'A data 1 é maior que a data 2.';
    		return 1;
    	} elseif (strtotime($data1) == strtotime($data2)) {
    		//echo 'A data 1 é igual a data 2.';
    		return 0;
    	} else{
    		//echo 'A data 1 é menor a data 2.';
    		return 2;
    	}
    }


    public function corRegistro($data1, $data2){

    	switch ($this->comparaData($data1, $data2)) {
    		case 0:
    			return 'warning';
    			break;
    		case 1:
    			return 'danger';
    			break;
    		case 2:
    			return 'menor';
    			break;
    		default:
    			# code...
    			break;
    	}
    }


    public function converteValorMonetario($valor, $separador = null){

        $separador = isset($separador) ? $separador : null;

        switch ($separador) {
            case ',':
                if ($valor > 0) {
                     $var = explode(',', $valor);
                    $novoValor = $var[0] . '.' . $var[1];
                    return $novoValor;
                } else {
                    return 0;
                }

                break;
            case '.':
                if ($valor > 0) {
                    $var = explode('.', $valor);
                    $novoValor = $var[0] . ',' . $var[1];
                    return $novoValor;
                } else {
                    return 0;
                }
            default:
                return 0;
                break;
        }
    }




}
