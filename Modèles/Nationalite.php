<?php
    class Nationalite
    {
        /**
         * Numéro de la nationalité
         * 
         * @var int
         */
        private $num;

        /**
         * Libellé de la nationalité
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
         * Num nationalite (clé étrangère) relié à num de nationalite
         *
         * @var int
         */
        private $numnationalite;

        /**
         * Renvoie l'objet nationalite associé
         *
         * @return nationalite
         */
        public function getNumnationalite() : nationalite
        {
            return nationalite::findById($this->numnationalite);
        }

        /**
         * Écrit le num nationalite
         *
         * @param nationalite $nationalite
         * @return self
         */
        public function setNumnationalite(nationalite $nationalite) : self
        {
            $this->numnationalite = $nationalite->getNum();
            return $this;
        }

        /**
         * Retourne l'ensemble des nationalités
         *
         * @return Nationalite[] Tableau d'objet Nationalité
         */
        public static function findAll() : array
        {
            $req=MonPdo::getInstance()->prepare("select n.num as numero, n.libelle as 'libNation', c.libelle as 'libnationalite' from nationalite n, nationalite c where n.numnationalite=c.num");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $LesResultats=$req->fetchAll();
            return $LesResultats;
        }

        /**
         * Trouve une nationalité par son num
         *
         * @param integer $id Numéro de la nationalité
         * @return nationalite Objet nationalité trouvé
         */
        public static function findById(int $id) : Nationalite
        {
            $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
            $req->bindParam(':id', $id);
            $req->execute();
            $LeResultat=$req->fetch();
            return $LeResultat;
        }

        /**
         * Permet d'ajouter une nationalité
         *
         * @param Nationalité $nationalité nationalite à ajouter
         * @return integer Résultat (1 si l'opération a réussi, O sinon)
         */
        public static function add(Nationalité $nationalité) : int
        {
            $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numnationalite) values(:libelle, :numnationalite)");
            $req->bindParam(':libelle', $nationalite->getLibelle());
            $req->bindParam(':numnationalite', $nationalite->numnationalite());
            $nb=$req->execute();
            return $nb;
        }

        /**
         * Permet de modifier une nationalité
         *
         * @param Nationalite $nationalité nationalite à modifier
         * @return integer Résultat (1 si l'opération a réussi, O sinon)
         */
        public static function update(Nationalite $nationalite) : int
        {
            $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numnationalite= :numnationalite where num= :id");
            $req->bindParam(':id', $nationalite->getNum());
            $req->bindParam(':libelle', $nationalite->getLibelle());
            $req->bindParam(':numnationalite', $nationalite->numnationalite());
            $nb=$req->execute();
            return $nb;
        }

        /**
         * Permet de supprimer une nationalité
         * 
         * @param Nationalite $nationalite
         * @return integer
         */
        public static function delete(Nationalite $nationalite) : int
        {
            $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
            $req->bindParam(':id', $nationalite->getNum());
            $nb=$req->execute();
            return $nb;
        }
    }

?>