<?php

class Etudiant{
    //Toutes les méthodes et propriétés nécessaires à la gestion des données de la table étudiants
    private $table="etudiants";
    private $connexion=null;

    //Les propriétés de l'objet étudiant
    public $id;
    public $nom;
    public $prenom;
    public $age;
    public $niveau_id;
    public $niveau_nom;
    public $created_at;

    //Connexion à la classe database d'une manière dynamique via le constructeur
    //Connection to the database class in a dynamic way via the constructor
    public function __construct($db)
    {
        if($this->connexion==null){
            $this->connexion=$db;
        }
    }

    //Création de la méthode de lecture et affichage des étudiants
    //Creation of the reading method and display of the students
    public function readAll()
    {
        //On écrit la requête
        $sql="SELECT e.nom, prenom, age, e.id, niveau_id, n.niveau as niveau_nom FROM $this->table e LEFT JOIN niveaux  n ON niveau_id=n.id";

        $req=$this->connexion->query($sql);

        return $req;
    }

    //Création de la méthode d'ajout étudiant
    //Creation of the student add-on method
    public function create()
    {
        $sql="INSERT INTO $this->table(nom,prenom,age,niveau_id,created_at) VALUES(:nom,:prenom,:age,:niveau_id,NOW())";

        //Préparation de la requête
        //Preparation of the request
        $req=$this->connexion->prepare($sql);

        //On exécute la requête
        //We execute the query
        $res=$req->execute([
            ":nom"=>$this->nom,
            ":prenom"=>$this->prenom,
            ":age"=>$this->age,
            ":niveau_id"=>$this->niveau_id
        ]);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Création de la méthode de modification étudiant
    //Creation of the student modification method
    public function update()
    {
        $sql="UPDATE $this->table SET nom=:nom,prenom=:prenom,age=:age,niveau_id=:niveau_id WHERE id=:id";

        //Préparation de la requête
        //Preparation of the request
        $req=$this->connexion->prepare($sql);

        //On exécute la requête
        //We execute the query
        $res=$req->execute([
            ":nom"=>$this->nom,
            ":prenom"=>$this->prenom,
            ":age"=>$this->age,
            ":niveau_id"=>$this->niveau_id,
            ":id"=>$this->id
        ]);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Méthode Delete étudiant
    //Delete student method
    public function delete()
    {
        $sql="DELETE FROM $this->table WHERE id=:id";

        //Préparation de la requête
        //Preparation of the request
        $req=$this->connexion->prepare($sql);

        //On exécute la requête
        //We execute the query
        $res=$req->execute([
            ":id"=>$this->id
        ]);

        if($res){
            return true;
        }else{
            return false;
        }
    }

}