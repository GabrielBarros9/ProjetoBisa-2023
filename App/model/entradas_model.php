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
    public function salvarModel($id_tipo,$descricao,$date,$valor)
    {
        $sql = "INSERT INTO Entradas (id_tipo_entrada,descricao,data_hora_entrada,valor_entrada) VALUES ($id_tipo,'$descricao','$date',$valor)";
        mysqli_query($this->conexao, $sql);
        $id = mysqli_insert_id($this->conexao);
        return $id;
    }
    public function listarModel()
    {
        $sql = "SELECT Entradas.id_entrada,Tipos_Entradas.id_tipo_entrada, Tipos_Entradas.nome, Entradas.descricao, Entradas.data_hora_entrada,Entradas.valor_entrada,(SELECT SUM(valor_entrada) FROM entradas) as 'total'
        FROM Entradas
        INNER JOIN Tipos_Entradas
        ON Entradas.id_tipo_entrada = Tipos_Entradas.id_tipo_entrada
        GROUP BY Entradas.id_entrada, Tipos_entradas.nome";
        $result = mysqli_query($this->conexao, $sql);
        return  $result->fetch_all(MYSQLI_ASSOC);
    }

    public function pegarTotal()
    {
        $sql = "SELECT SUM(valor_entrada) as total FROM entradas";
        $result = mysqli_query($this->conexao, $sql);
        return  $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deletarModel($id)
    {
        $query = "DELETE FROM entradas WHERE id_entrada = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
    public function editarModel($id, $id2, $descricao, $valor)
    {
        $query = "UPDATE entradas SET id_tipo_entrada = '$id2',descricao = '$descricao', valor_entrada = $valor WHERE id_entrada = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
}
