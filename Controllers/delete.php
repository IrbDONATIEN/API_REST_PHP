<?php
//Les entêtes requêtes pour sécuriser l'API
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=UTF-8");
header("Access-Control-Allow-Methods:DELETE");

//Importer les fichiers une fois seulement lors de l'exécution de l'application
require_once('../Config/Database.php');
require_once('../Models/Etudiant.php');

//Conditionner l'api a respecté seulement la méthode autorisée
if($_SERVER['REQUEST_METHOD']==="DELETE"){
    //On instancie la base de données
    $database=new Database();
    $db=$database->getConnection();

    //On instancie l'objet étudiant
    $etudiant=new Etudiant($db);

    //On récupère les infos envoyées
    $data=json_decode(file_get_contents("php://input"));
    if(!empty($data->id)){
        //On rafraichi l'objet étudiant
        $etudiant->id=intval($data->id);
        $result=$etudiant->delete();
        if($result){
            http_response_code(201);
            echo json_encode(["message"=>"L'étudiant a été supprimé avec succès."]);
        }else{
            http_response_code(503);
            echo json_encode(["message"=>"La suppression de l'étudiant a échoué."]);
        }

    }else{
        echo json_encode(["message"=>"Les données ne sont au complet"]);
    }
}else{
    http_response_code(405);
    echo json_encode(["message"=>"La méthode n'est pas autorisée"]);
}