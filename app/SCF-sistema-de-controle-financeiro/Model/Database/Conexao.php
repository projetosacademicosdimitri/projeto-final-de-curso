<?php
 /*@author Dimitri Miranda 15/08/2013
  * Essa classe herda de PDO, seu construtor é responsavél por chamar
  * O método construtor da class PDO em seu construtor.
  * Ela será estendia para  todas as class  que 
  * fizerem  transaçoes no banco, seus atribultos são definidos   
  * como constantes, 
  */
ini_set('default_charset','UTF-8');
 abstract class Conexao extends PDO{
 
 const DSN = "mysql:host=localhost; dbname=scf";
 const USERNAME = "root";
 const PASSWORD = ""; 
     
public function __construct()
{

   
    parent::__construct(Conexao::DSN,Conexao::USERNAME,Conexao::PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
    
}  

} 

?>

