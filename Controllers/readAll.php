<?php
//Les entêtes requêtes pour sécuriser l'API
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=UTF-8");
header("Access-Control-Allow-Methods:GET");

//Importer les fichiers une fois seulement lors de l'exécution de l'application
require_once('../Config/Database.php');
require_once('../Models/Etudiant.php');

//Conditionner l'api a respecté seulement la méthode autorisée
if($_SERVER['REQUEST_METHOD']==="GET"){
    //On instancie la base de données
    $database=new Database();
    $db=$database->getConnection();

    //On instancie l'objet étudiant
    $etudiant=new Etudiant($db);

    //Récupération des données
    $statement=$etudiant->readAll();

    //Lecture dans un tableau
    if($statement->rowCount()>0)
    {
        //Création d'une variable tableau
        $data=[];

        //Affecter les données dans un tableau
        $data[]=$statement->fetchAll();

        //On renvoie ses données sous format json
        http_response_code(200);
        echo json_encode($data);
    }else{
        echo json_encode(["message"=>"Aucune données à renvoyer"]);
    }
}else{
    http_response_code(405);
    echo json_encode(["message"=>"La méthode n'est pas autorisée"]);
}