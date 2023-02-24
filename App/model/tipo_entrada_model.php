<?php
require '../config/conexao.php';
class EntradasModel
{
    private $conexaoInstance;
    private $conexao;
    public function __construct()
    {
        $this->conexaoInstance = new Conexao();
        $this->conexao = $this->conexaoInstance->getConnection();
    }
    public function salvar($nome)
    {
        $sql = "INSERT INTO tipos_entradas (nome) VALUES ('$nome')";
        mysqli_query($this->conexao, $sql);
        $id = mysqli_insert_id($this->conexao);
        return $id;
    }
    public function listar()
    {
        $sql = "SELECT * FROM tipos_entradas";
        $result = mysqli_query($this->conexao, $sql);
        return  mysqli_fetch_all($result);
    }
    public function deletar($id)
    {
        $query = "DELETE FROM tipos_entradas WHERE id_tipo_entrada = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
    public function editar($nomeEditar,$id)
    {
        $query = "UPDATE tipos_entradas SET nome = '$nomeEditar' WHERE id_tipo_entrada = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
}
