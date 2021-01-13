<?php
    class PieceQuantik
    {
        //public static int $WHITE = 0; // ou ?
        public const WHITE    = 0;
        public const BLACK    = 1;
        public const VOID     = 0;
        public const CUBE     = 1;
        public const CONE     = 2;
        public const CYLINDRE = 3;
        public const SPHERE   = 4;

        public static function initVoid():PieceQuantik
        {
            return new PieceQuantik(self::VOID, self::WHITE);
        }

        public static function initWhiteCube():PieceQuantik
        {
            return new PieceQuantik(self::CUBE, self::WHITE);
        }

        public static function initBlackCube():PieceQuantik
        {
            return new PieceQuantik(self::CUBE, self::BLACK);
        }

        public static function initWhiteCone():PieceQuantik
        {
            return new PieceQuantik(self::CONE, self::WHITE);
        }

        public static function initBlackCone():PieceQuantik
        {
            return new PieceQuantik(self::CONE, self::BLACK);
        }

        public static function initWhiteCylindre():PieceQuantik
        {
            return new PieceQuantik(self::CYLINDRE, self::BLACK);
        }

        public static function initBlackCylindre():PieceQuantik
        {
            return new PieceQuantik(self::CYLINDRE, self::BLACK);
        }

        public static function initWhiteSphere():PieceQuantik
        {
            return new PieceQuantik(self::SPHERE, self::WHITE);
        }

        public static function initBlackSphere():PieceQuantik
        {
            return new PieceQuantik(self::SPHERE, self::BLACK);
        }

        protected int $forme = 0;
        protected int $couleur = 0;

        private function __construct(int $forme, int $couleur)
        {
            $this->forme   = $forme;
            $this->couleur = $couleur;
        }

        public function getForme(): int
        {
            return $this->forme;
        }

        /**
         * @return int
         */
        public function getCouleur(): int
        {
            return $this->couleur;
        }

        //Todo toString a revoir ?
        public function __toString():string
        {
            $res = "couleur: ";

            $res .= $this->couleur == self::WHITE ? "White" : "Black";
            $res .= ", type: ";

            $tmp = "";

            switch ($this->forme)
            {
                case self::CUBE    : $tmp .= sprintf("%-10s","Cube"    );break;
                case self::CONE    : $tmp .= sprintf("%-10s","Cone"    );break;
                case self::CYLINDRE: $tmp .= sprintf("%-10s","Cylindre");break;
                case self::SPHERE  : $tmp .= sprintf("%-10s","Sphere"  );break;
                case self::VOID    : $tmp .= sprintf("%-10s","Void");break;
            }

            $res .= sprintf("%8s", $tmp);

            $res = str_replace(" ", "&nbsp;", $res);

            return $res;
        }
    }
?>
