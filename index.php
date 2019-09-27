<?php

/*

CREATE DATABASE `pdo` /*!40100 DEFAULT CHARACTER SET latin1 */

/*

CREATE TABLE `tabla1` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `col1` varchar(50) NOT NULL,
 `col2` varchar(50) NOT NULL,
 `col3` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1
*/
try{
        // Conexión a la base de datos
    $connect = new PDO('mysql:host=localhost;dbname=pdo', 'tu-user', 'tu-pass');
    $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}

// Sacar un resultado
    $sql = $connect->prepare('SELECT * FROM tabla1 WHERE id = :id');
    $sql->execute(array('id' => 2));
    $resultado = $sql->fetchAll();

    // Mostrar resultados
    var_dump($resultado[0]);
 
    // Sacar todos los resultados de la base de datos
    $sql = $connect->prepare('SELECT * FROM tabla1');
    $sql->execute();
    $resultado = $sql->fetchAll();
 
    // Mostrar resultados
    foreach ($resultado as $row) {
        echo $row["col1"];
    }