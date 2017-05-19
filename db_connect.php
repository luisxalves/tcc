<?php

// classe para conectar ao banco de dados
class DB_CONNECT
{
    //construtor da classe
    function __construct()
    {
        //conectando ao banco de dados
        $this->connect();
    }
    
    //destruidor
    function __destruct()
    {
        //fechando a conexão com o banco de dados
        $this->close();
    }
    
    //função para conexão com o banco de dados
    function connect()
    {
        //importar para o banco de dados as variaveis de conexão
        include 'db_config.php';
        
        //conectar ao banco de dados MySql
        $con = @mysql_connect (DB_SERVER, DB_USER, DB_PASSWORD) or die (mysql error());
        
        //selecionando o banco de dados
        $db = mysql_select_db (DB_DATABASE) or die(mysql_error()) or die(mysql_error());
        
        //retornando o cursos da conexão
        return $con;
    }
    
    //função para fechar a conexão
    function close()
    {
        //fechando a conexão
        mysql_close();
    }
}

?>
