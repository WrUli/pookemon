<?php 

class Pokemon {

    const type_eau = "eau";
    const type_feu = "feu";

    private $nom;
    private $pv;
    private $attaque;
    private $defense;
    private $type;


    public function __construct($nom, $pv, $attaque, $defense, $type) {
        $this->nom = $nom;
        $this->pv = $pv;
        $this->attaque = $attaque + rand(-2, 2);
        $this->defense = $defense + rand(-2, 2);
        $this->type = $type;
    }

    public function getNom() {   
        return $this->nom;
    }
    public function setNom ($nom) {
        $this->nom=$nom;
    }

    public function getPV() {
        return $this->pv;
    }
    public function setPV($pv) {
        $this->pv=$pv;
    }

    public function getAttaque() {
        return $this->attaque;
    }
    public function setAttaque($attaque) {
        $this->attaque=$attaque;
    }

    public function getDefense() {
        return $this->defense;
    }
    public function setDefense($defense) {
        $this->defense=$defense;
    }

    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type=$type;
    }



    public function attaquer(Pokemon $adversaire) {
        $facteur = $this->calculerEfficaciteAttaque($adversaire->getType());
        $degats = ($this->attaque * $facteur) - $adversaire->defense;  
        if ($facteur > 1) {
            echo $this->nom . ' attaque et c\'est SUPER EFFICACE ' . $adversaire->nom . ' et lui inflige ' . $degats . ' points de dégâts !<br>';
        } elseif ($facteur === 1) {
            echo $this->nom . ' attaque ' . $adversaire->nom . ' et lui inflige ' . $degats . ' points de dégâts !<br>';
        }else {
            echo $this->nom . ' attaque et c\'est pas très efficace... ' . $adversaire->nom . ' et lui inflige ' . $degats . ' points de dégâts !<br>';
        }
        
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats($degats) {
        $this->pv -= $degats;
        if ($this->pv < 0) {
            $this->pv = 0;
    }
        echo $this->nom . ' subit ' . $degats . ' points de dégâts et a désormais plus que ' . $this->pv . ' PV.<br><br>';
    }

    public function calculerEfficaciteAttaque($typeDefenseur) {
        if ($this->type === self::type_eau && $typeDefenseur === self::type_feu) {
            return 1.2;
        } elseif ($this->type === self::type_feu && $typeDefenseur === self::type_eau) {
            return 0.8;
        } else {
            return 1;
        }
    }
}

function arene(Pokemon $pokemon1,Pokemon $pokemon2) {
    while($pokemon1->getPV() > 0 && $pokemon2->getPV() > 0){
        $attaquant = $pokemon1;
        $defenseur = $pokemon2;
        if (rand(0, 1) == 1) {
            $attaquant = $pokemon2;
            $defenseur = $pokemon1;
        }

        $attaquant->attaquer($defenseur);

        if ($defenseur->getPV() <= 0) {
            echo $defenseur->getNom() . ' est K.0 !<br>';
            break;
        }
    }
}

?>