<?php
//Les entêtes requêtes pour sécuriser l'API
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=UTF-8");
header("Access-Control-Allow-Methods:PUT");

//Importer les fichiers une fois seulement lors de l'exécution de l'application
require_once('../Config/Database.php');
require_once('../Models/Etudiant.php');

//Conditionner l'api a respecté seulement la méthode autorisée
if($_SERVER['REQUEST_METHOD']==="PUT"){
    //On instancie la base de données
    $database=new Database();
    $db=$database->getConnection();

    //On instancie l'objet étudiant
    $etudiant=new Etudiant($db);

    //On récupère les infos envoyées
    $data=json_decode(file_get_contents("php://input"));
    if(!empty($data->id) && !empty($data->nom) && !empty($data->prenom) && !empty($data->age) && !empty($data->niveau_id)){
        //On rafraichi l'objet étudiant
        $etudiant->id=intval($data->id);
        $etudiant->nom=htmlspecialchars($data->nom);
        $etudiant->prenom=htmlspecialchars($data->prenom);
        $etudiant->age=intval($data->age);
        $etudiant->niveau_id=intval($data->niveau_id);

        $result=$etudiant->update();
        if($result){
            http_response_code(201);
            echo json_encode(["message"=>"L'étudiant a été modifié avec succès."]);
        }else{
            http_response_code(503);
            echo json_encode(["message"=>"La modification de l'étudiant a échoué."]);
        }

    }else{
        echo json_encode(["message"=>"Les données ne sont au complet"]);
    }
}else{
    http_response_code(405);
    echo json_encode(["message"=>"La méthode n'est pas autorisée"]);
}