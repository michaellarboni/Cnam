<?php
/**
 * Class de type Modèle gérant la table CONTENUS
*/
class MPages
{
    /**
     * Connexion à la Base de Données
     * @var object $conn
     */
    private $conn;
    /**
    * Clef primaire de la table CONTENUS
    * @var int identifiant du document
    */
    private $id_contenu;
    /**
    * Tableau de gestion de données (insert ou update)
    * @var array tableau des données
    */
    private $value;

    /**
    * Constructeur de la class MPages
    * Instancie le membre privé $conn
    * @access public
    * @param int identifiant du document
    *
    * @return
    */
    public function __construct($_id_contenu = null)
    {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

    // Instanciation du membre $id_contenu
    $this->id_contenu = $_id_contenu;

    return;

    } // __construct()

    public function __destruct() {} // __destruct()

    public function SetValue($_value)
    {
    $this->value = $_value;

    return;

    } // SetValue($_value)

    /**
     * Récupère plusieurs tuples de la table CONTENUS
     * @access public
     *
     * @return array tuples de la table CONTENU
     */
    public function SelectAll()
    {
        /*$query = 'select C.ID_CONTENU, TITRE, TEXTE
              from CONTENUS C , ITEMS_CONTENUS IC
              where IC.ID_CONTENU = C.ID_CONTENU
              and IC.ID_ITEM = :ID_ITEM
              order by C.ID_CONTENU';
        */
        $query = 'select C.ID_CONTENU,
                         C.ID_ITEM,
                         C.TITRE, C.PARAGRAPHE,
                         C.TEXTE,
                         C.FICHIER,
                         I.ID_ITEM,
                         I.ITEM
                  from   CONTENUS C
                  INNER JOIN ITEMS I ON I.ID_ITEM = C.ID_ITEM
                  and I.ID_ITEM = :ID_ITEM
                  order by C.ID_CONTENU';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_ITEM', $this->value['ID_ITEM'], PDO::PARAM_INT);

        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetchAll();

    } // SelectAll()

    /**
    * Récupère plusieurs tuples de la table CONTENUS
    * @access public
    *
    * @return array tuples de la table CONTENUS
    */
    public function Select()
    {
    $query = 'select ID_ITEM, ID_CONTENU, TITRE, TEXTE, PARAGRAPHE
              from CONTENUS
              where ID_CONTENU = :ID_CONTENU';

    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_CONTENU', $this->id_contenu, PDO::PARAM_INT);

    $result->execute() or die ($this->ErrorSQL($result));

    return $result->fetch();

    } // Select()

    public function SelectFichier()
    {
        $query = 'select FICHIER
              from CONTENUS
              where ID_CONTENU = :ID_CONTENU';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_CONTENU', $this->id_contenu, PDO::PARAM_INT);

        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetch();

    } // Select()

    /**
     * Récupère plusieurs tuples de la table CONTENUS
     * @access public
     *
     * @return array tuples de la table CONTENUS
     */
    public function SelectParagraphesAll()
    {
        $query = 'select P.ID_PARAGRAPHE, 
                         P.PARAGRAPHE,
                         C.TITRE,
                         C.ID_CONTENU,
                         C.ID_ITEM
                  from   PARAGRAPHES P
                  INNER JOIN CONTENUS C ON P.ID_CONTENU = C.ID_CONTENU
                  and C.ID_CONTENU = :ID_CONTENU and C.ID_ITEM = :ID_ITEM
                  order by C.ID_CONTENU';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_CONTENU', $this->id_contenu, PDO::PARAM_INT);
        $result->bindValue(':ID_ITEM', $this->value['ID_ITEM'], PDO::PARAM_INT);

        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetchAll();

    } // Select()

    /**
    * Récupère plusieurs tuples de la table CONTENUS
    * @access public
    *
    * @return array tuples de la table CONTENUS
    */
    public function SelectImages()
    {
      $query = 'select IMAGE
                from CONTENUS_IMAGES CI, IMAGES I, CONTENUS C
                where CI.ID_IMAGE = I.ID_IMAGE
                and  CI.ID_CONTENU = C.ID_CONTENU
                and ID_ITEM = :ID_ITEM';

      $result = $this->conn->prepare($query);

      $result->bindValue(':ID_ITEM', $this->value['ID_ITEM'], PDO::PARAM_INT);

      $result->execute() or die ($this->ErrorSQL($result));

      return $result->fetchAll();

    } // SelectImages()

    /**
    * Insère les données d'un tuple dans la table CONTENUS
    * @access public
    *
    * @return array tuple de la table CONTENUS
    */
    public function Insert()
    {
      $query = 'insert into CONTENUS (ID_ITEM, TITRE, TEXTE, PARAGRAPHE)
                values(:ID_ITEM, :TITRE, :TEXTE, :PARAGRAPHE)';

      $result = $this->conn->prepare($query);

      $result->bindValue(':ID_ITEM', $this->value['ID_ITEM'], PDO::PARAM_INT);
      $result->bindValue(':TITRE', $this->value['TITRE'], PDO::PARAM_STR);
      $result->bindValue(':TEXTE', $this->value['TEXTE'], PDO::PARAM_STR);
      $result->bindValue(':PARAGRAPHE', $this->value['PARAGRAPHE'], PDO::PARAM_STR);

      $result->execute() or die ($this->ErrorSQL($result));

      $this->id_contenu = $this->conn->LastInsertId();

      return;

    } // Insert()

    /**
    * Modifie les données d'un tuple dans la table CONTENUS
    * @access public
    *
    * @return array tuple de la table CONTENUS
    */
    public function Update()
    {
      $query = 'update CONTENUS
                set TITRE = :TITRE,
                    TEXTE = :TEXTE,
	 	    PARAGRAPHE = :PARAGRAPHE,
                    ID_CONTENU = :ID_CONTENU 
                where ID_ITEM = :ID_ITEM
                and   ID_CONTENU = :ID_CONTENU';

      $result = $this->conn->prepare($query);

      $result->bindValue(':ID_ITEM', $this->value['ID_ITEM'], PDO::PARAM_INT);
      $result->bindValue(':ID_CONTENU', $this->value['ID_CONTENU'], PDO::PARAM_INT);
      $result->bindValue(':TITRE', $this->value['TITRE'], PDO::PARAM_STR);
      $result->bindValue(':TEXTE', $this->value['TEXTE'], PDO::PARAM_STR);
      $result->bindValue(':PARAGRAPHE',$this->value['PARAGRAPHE'], PDO::PARAM_STR);

      $result->execute() or die ($this->ErrorSQL($result));

      return;

    } // Update()

    /**
    * Supprime un tuple de la table CONTENUS
    * @access public
    *
    * @return array tuple de la table CONTENUS
    */
    public function Delete()
    {
      $query = 'delete from CONTENUS
                where ID_CONTENU = :ID_CONTENU';

      $result = $this->conn->prepare($query);

      $result->bindValue(':ID_CONTENU', $this->id_contenu, PDO::PARAM_INT);

      $result->execute() or die ($this->ErrorSQL($result));

      return;

    } // Delete()

    /**
    * Insère les données d'un tuple dans la table IMAGES
    * @access public
    *
    * @return array tuple de la table IMAGES
    */
    public function InsertImage()
    {
      $query = 'insert into IMAGES (IMAGE)
                values(:IMAGE)';

      $result = $this->conn->prepare($query);

      $result->bindValue(':IMAGE', $this->value['IMAGE'], PDO::PARAM_STR);

      $result->execute() or die ($this->ErrorSQL($result));

      return $this->conn->lastInsertId();

    } // Insert()

    /**
    * Insère les données d'un tuple dans la table IMAGES
    * @access public
    *
    * @return array tuple de la table IMAGES
    */
    public function InsertContenusImages()
    {
      $query = 'insert into CONTENUS_IMAGES (ID_CONTENU, ID_IMAGE)
                values(:ID_CONTENU, :ID_IMAGE)';

      $result = $this->conn->prepare($query);

      $result->bindValue(':ID_CONTENU', $this->value['ID_CONTENU'], PDO::PARAM_INT);
      $result->bindValue(':ID_IMAGE', $this->value['ID_IMAGE'], PDO::PARAM_INT);

      $result->execute() or die ($this->ErrorSQL($result));

      return;

    } // Insert()

    /**
    * Récupère les erreurs SQL
    * @access private
    * @param statement résultat de la préparation
    *
    * @return none;
    */
    private function ErrorSQL($result)
    {
    // Récupère le tableau des erreurs
    $error = $result->errorInfo();

    echo 'TYPE_ERROR = ' . $error[0] . '<br />';
    echo 'CODE_ERROR = ' . $error[1] . '<br />';
    echo 'MSG_ERROR = ' . $error[2] . '<br />';

    return;

    } // ErrorSQL($result)

} // MDocuments
