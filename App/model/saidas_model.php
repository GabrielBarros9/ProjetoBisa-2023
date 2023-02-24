<?php
require '../config/conexao.php';
class SaidaModel
{
    private $conexaoInstance;
    private $conexao;
    public function __construct()
    {
        $this->conexaoInstance = new Conexao();
        $this->conexao = $this->conexaoInstance->getConnection();
    }
    public function salvarModel($id_tipo, $descricao, $date, $valor)
    {
        $sql = "INSERT INTO Saidas (id_tipo_saida,descricao,data_hora_saida,valor_saida) VALUES ($id_tipo,'$descricao','$date',$valor)";
        mysqli_query($this->conexao, $sql);
        $id = mysqli_insert_id($this->conexao);
        return $id;
    }
    public function listarModel()
    {
        $sql = "SELECT Saidas.id_saida,Tipos_Saidas.id_tipo_saida, Tipos_Saidas.nome, Saidas.descricao, Saidas.data_hora_saida, Saidas.valor_saida,(SELECT SUM(valor_saida) FROM saidas) as 'total'
        FROM Saidas
        INNER JOIN Tipos_Saidas
        ON Saidas.id_tipo_saida = Tipos_Saidas.id_tipo_saida
        GROUP BY Saidas.id_saida, Tipos_saidas.nome";
        $result = mysqli_query($this->conexao, $sql);
        return  $result->fetch_all(MYSQLI_ASSOC);
    }
    public function pegarTotal()
    {
        $sql = "SELECT SUM(valor_saida) as total FROM saidas";
        $result = mysqli_query($this->conexao, $sql);
        return  $result->fetch_all(MYSQLI_ASSOC);
    }
    public function deletarModel($id)
    {
        $query = "DELETE FROM saidas WHERE id_saida = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
    public function editarModel($id, $id2, $descricao, $valor)
    {
        $query = "UPDATE saidas SET id_tipo_saida = '$id2',descricao = '$descricao', valor_saida = $valor WHERE id_saida = $id";
        mysqli_query($this->conexao, $query);
        return true;
    }
}
