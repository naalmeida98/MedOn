<?php
class Prontuario{
	private $problemas;
	private $medicacoes;
	private $alergias;
	private $cirurgias;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}
