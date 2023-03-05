<?php
class Produit {
    // Propriétés ou attributs de la classe
    public $id;
    public $prix;
    public $reduction;
    public $nom;

    public $fabricant;
    public $fabricantId;

    // Définition du constructeur
    public function __construct($id = null, $prix = null, $nom = null, $reduction = null) {
        $this->$id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->reduction = $reduction;
    }
}
?>