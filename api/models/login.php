<?php
class Login
{
    // Connexion
    private $connexion;
    private $table = "authentification"; //table de la base de données
    private $table_2 = "utilisateur"; //table de la base de données
    private $table_3 = "etudiant"; //table de la base de données
    private $table_4 = "pilote"; //table de la base de données
    private $table_5 = "delegue"; //table de la base de données

    // object properties 
    public $ID_Login;
    public $Login;
    public $Mot_de_passe;

    public $ID_Utilisateur;
    public $Nom;
    public $Prenom;
    public $Photo_Utilisateur;
    private $ID_Login_U;

    public $Token;




    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db)
    {
        $this->connexion = $db;
    }

    /**
     * Lecture des entreprises
     *
     * @return void
     */


    public function login() // Methode POST ou l'on fournit login et mot de passe
    {
        // On écrit la requête
        $sql = "SELECT * FROM " . $this->table . " WHERE Login =:Login AND Mot_de_passe =:Mot_de_passe";
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        // On attache l'id
        $query->bindParam(':Login', $this->Login);
        $query->bindParam(':Mot_de_passe', $this->Mot_de_passe);
        // On exécute la requête
        $query->execute();
        // On hydrate l'objet
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->ID_Login  = $row['ID_Login'];


        $sql2 = "SELECT * FROM " . $this->table_2 . " WHERE ID_Login =:ID_Login"; //continue ici (recherche utilisateur par ID)
        $query2 = $this->connexion->prepare($sql2);
        $query2->bindParam(':ID_Login', $this->ID_Login);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $this->Nom = $row2['Nom'];
        $this->Prenom = $row2['Prenom'];
        $this->Photo_Utilisateur = $row2['Photo_Utilisateur'];


        $sql3 = "
        (SELECT ID_Login FROM " . $this->table_3 . " WHERE ID_Login =:ID_Login)
        UNION
        (SELECT ID_Login FROM " . $this->table_4 . " WHERE ID_Login =:ID_Login)
        UNION
        (SELECT ID_Login FROM " . $this->table_5 . " WHERE ID_Login =:ID_Login)
        ";
        $query3 = $this->connexion->prepare($sql3);
        $query3->bindParam(':ID_Login', $this->ID_Login);
        $query3->execute();



    }






}