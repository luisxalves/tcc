<?php

//verifica��o de login

$response = array();

//incluindo a classe de conex�o
include 'db_connect.php';

//conectando ao banco de dados
$db = new DB_CONNECT();

//pegar todos os usuarios da tabela
$result = mysql_query ("SELECT *FROM usuarios") or die (mysql_error());

//verificando resultado vazio
if (mysql_num_rows ($result) > 0)
{
    //passar por todos os resultados
    $response ["usuarios"] = array();
    
    while ($row = mysql_fetch_array($result))
    {
        $pessoa = array();
        $pessoa["id"] = $row["id"];
        $pessoa["nome"] = $row["nome"];
        
        //colocando a pessoa no final do array de resposta
        array_push($response["usuarios"], $pessoa);
    }
    $response ["sucess"] = 1;
    
    //lan�ando resposta JSON
    echo json_encode ($response);
}
else
{
    //n ha pessoas cadastradas
    $response["sucess"] = 0;
    $response["message"] = "N�o ha nenhum usuario cadastrado";
    
    //lan�ando resposta JSON
    echo json_encode($response);
}
?>