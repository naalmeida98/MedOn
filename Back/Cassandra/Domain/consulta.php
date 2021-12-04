<?php
class Consulta
{
	private $cpf_paciente;
	private $data;
	private $diagnostico;
	private $obs_consulta;
	private $id_consulta;


	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}
}
