<?php
class Login
{
    // Connexion
    private $connexion;
    private $table = "authentification"; //table de la base de données
    private $table_2 = "utilisateur"; //table de la base de données

    // object properties 
    public $ID_Login;
    public $Login;
    public $Mot_de_passe;

    public $ID_Utilisateur;
    public $Nom;
    public $Prenom;
    public $Photo_Utilisateur;
    public $ID_Login_U;

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



    public function login()
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

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->ID_Login = $row['ID_Login'];

    }
}