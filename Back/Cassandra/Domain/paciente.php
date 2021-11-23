<?php
class Paciente{
	private $nome;
	private $cpf;
	private $data_nascimento;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}
