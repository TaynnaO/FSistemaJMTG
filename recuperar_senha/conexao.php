<?php
    header('Content-Type: text/html; charset=utf-8;');
    
    class Conexao
    {
        public static function getConexao()
        {
            try {
                return new PDO("mysql:host=localhost;dbname=jobs;", "root", "");
            } catch(Exception $e) {
                echo 'Erro ao conectar com o banco de dados . ' . $e->getMessage();
            }
        }
    }
    $pdo = Conexao::getConexao();
    