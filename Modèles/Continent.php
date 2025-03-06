<?php
    class nationalite
    {
        /**
         * Numéro du nationalite
         * 
         * @var int
         */
        private $num;

        /**
         * Libellé du nationalite
         *
         * @var string
         */
        private $libelle;

        /**
         * Get the value of num
         */
        public function getNum()
        {
            return $this->num;
        }

        /**
         * Lit le libellé
         *
         * @return string
         */
        public function getLibelle() : string
        {
            return $this->libelle;
        }

        /**
         * Écrit dans le libellé
         *
         * @param string $libelle
         * @return self
         */
        public function setLibelle(string $libelle) : self
        {
            $this->libelle = $libelle;
            return $this;
        }

        /**
         * Retourne l'ensemble des nationalites
         *
         * @return nationalite[] Tableau d'objet nationalite
         */
        public static function findAll() : array
        {
            $req=MonPdo::getInstance()->prepare("Select * from nationalite");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'nationalite');
            $req->execute();
            $LesResultats=$req->fetchAll();
            return $LesResultats;
        }

        /**
         * Trouve un nationalite par son num
         *
         * @param integer $id Numéro du nationalite
         * @return nationalite Objet nationalite trouvé
         */
        public static function findById(int $id) : nationalite
        {
            $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'nationalite');
            $req->bindParam(':id', $id);
            $req->execute();
            $LeResultat=$req->fetch();
            return $LeResultat;
        }

        /**
         * Permet d'ajouter un nationalite
         *
         * @param nationalite $nationalite nationalite à ajouter
         * @return integer Résultat (1 si l'opération a réussi, O sinon)
         */
        public static function add(nationalite $nationalite) : int
        {
            $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle) values(:libelle)");
            $libelle=$nationalite->getLibelle();
            $req->bindParam(':libelle', $libelle);
            $nb=$req->execute();
            return $nb;
        }

        /**
         * Permet de modifier un nationalite
         *
         * @param nationalite $nationalite nationalite à modifier
         * @return integer Résultat (1 si l'opération a réussi, O sinon)
         */
        public static function update(nationalite $nationalite) : int
        {
            $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle where num= :id");
            $num=$nationalite->getNum();
            $libelle=$nationalite->getLibelle();
            $req->bindParam(':id', $num);
            $req->bindParam(':libelle', $libelle);
            $nb=$req->execute();
            return $nb;
        }

        /**
         * Permet de supprimer un nationalite
         * 
         * @param nationalite $nationalite
         * @return integer
         */
        public static function delete(nationalite $nationalite) : int
        {
            $req=MonPDO::getInstance()->prepare("delete from nationalite where num= :id");
            $num=$nationalite->getNum();
            $req->bindParam(':id', $num);
            $nb=$req->execute();
            return $nb;
        }

        /**
         * Set numéro du nationalite
         * 
         * @param int $num Numéro du nationalite
         * 
         * @return self
         */
        public function setNum(int $num) : self
        {
            $this->num=$num;
            return $this;
        }
    }

?>