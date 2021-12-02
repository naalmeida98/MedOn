<?php
class Receita{
	private $data;
	private $remedio;
	private $dosagem;
    private $tempo;
    private $obs_receita;
	private $id_receita;


	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}

?>