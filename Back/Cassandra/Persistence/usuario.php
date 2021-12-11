
<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/Back/Cassandra/conexao.php';
require_once '../../../../MedOn/lib/php-cassandra.php';
class Serviços_usuario
{

    private $conexao;
    private $crm;
    private $nome;
    private $data_nascimento;
    private $senha;

    public function __construct(Conexao $conexao, Usuario $usuario)
    {
        $this->conexao = $conexao->conectar();
        $this->crm = $usuario->__get('crm');
        $this->nome = $usuario->__get('nome');
        $this->data_nascimento = $usuario->__get('data_nascimento');
        $this->senha = $usuario->__get('senha');
    }

    public function inserirUsuario()
    {
        $usuario = [
            'nome' => $this->nome,
            'crm' => $this->crm,
            'data_nascimento' => $this->data_nascimento,
            'senha' => $this->senha
        ];

        $collection = $this->conexao->querySync('SELECT * FROM "usuario" WHERE "crm" = :crm ', ['crm' => $this->crm], null, ['names_for_values' => true]);
        $qtd = count((array)$collection->fetchAll());

        if ($qtd == 1) {
            header('Location: ../src/cadastroUsuario.php?usuarioexistente=1');
        } else {
            $cql = 'INSERT INTO "usuario" ("crm", "data_nascimento", "nome", "senha") 
            VALUES (:crm, :data_nascimento, :nome, :senha)';

            $this->conexao->querySync($cql, $usuario, null, ['names_for_values' => true]);
            header('Location: ../src/index.php');
        }
    }

    public function logar()
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        $collection = $this->conexao->querySync('SELECT * FROM "usuario" WHERE "crm" = :crm ', ['crm' => $this->crm], null, ['names_for_values' => true]);
        $usuario = (array)$collection->fetchAll();
        $qtd = count($usuario);

        if ($qtd == 1) {
            if ($usuario[0]['senha'] != $this->senha) {
                header('Location: ../src/index.php?loginnegado=1');
                echo 'Senha incorreta';
            } else {
                echo 'Senha correta';
                $_SESSION["nome_medico"] = $usuario[0]['nome'];
                $_SESSION["crm_medico"] = $usuario[0]['crm'];
                header('Location: ../src/home.php');
            }
        } else {
            echo 'Login negado';
            header('Location: ../src/index.php?loginnegado=1');
        }
    }
} ?>
