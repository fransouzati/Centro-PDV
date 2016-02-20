<?php
class MathComponent extends Component {
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
				return $intervalo->format('%a');
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



}
