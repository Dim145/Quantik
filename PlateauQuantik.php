<?php
    include("PieceQuantik.php");
    include("ActionQuantik.php");

    class PlateauQuantik
    {
        public const NBROWS = 4;
        public const NBCOLS = 4;

        public const NW = 0;
        public const NE = 1;
        public const SW = 2;
        public const SE = 3;
        PROTECTED $cases;

        public function __construct()
        {
            //$this->cases = array(array(null,null,null,null), array(null,null,null,null), array(null,null,null,null), array(null,null,null,null));

            $this->cases = array();

            for( $cpt = 0; $cpt < self::NBROWS; $cpt++ )
            {
                $this->cases[$cpt] = array();

                for ($cpt2 = 0; $cpt2 < self::NBCOLS; $cpt2++)
                    $this->cases[$cpt][$cpt2] = PieceQuantik::initVoid();
            }
        }

        public function getPieces(int $numRow, int $numCol):PieceQuantik
        {
            return $this->cases[$numRow][$numCol];
        }

        public function setPiece(int $numRow, int $numCol, PieceQuantik $p):void
        {
            $this->cases[$numRow][$numCol] = $p;
        }

        public function getRow(int $numRow):array
        {
            //return array($this->cases[$numRow][0], $this->cases[$numRow][1], $this->cases[$numRow][2], $this->cases[$numRow][3]);
            return $this->cases[$numRow];
        }

        public function getCol(int $numCol):array
        {
            $tab = array();

            for ($cpt = 0; $cpt < self::NBROWS; $cpt++)
                $tab[$cpt] = $this->cases[$cpt][$numCol];

            //return array($this->cases[0][$numCol], $this->cases[1][$numCol], $this->cases[2][$numCol], $this->cases[3][$numCol]);
            return $tab;
        }

        public function getCorner(int $dir):array
        {
            if($dir == PlateauQuantik::NW)
                return array($this->cases[0][0], $this->cases[0][1], $this->cases[1][0], $this->cases[1][1]);
            else if($dir == PlateauQuantik::NE)
                return array($this->cases[0][2], $this->cases[0][3], $this->cases[1][2], $this->cases[1][3]);
            else if($dir == PlateauQuantik::SW)
                return array($this->cases[2][0], $this->cases[2][1], $this->cases[3][0], $this->cases[3][1]);
            else if($dir == PlateauQuantik::SE)
                return array($this->cases[2][2], $this->cases[2][3], $this->cases[3][2], $this->cases[3][3]);

            return array();
        }

        public function __toString():String
        {
            $ret = "";
            for ($i=0; $i < 4; $i++)
            { 
                $ret.="{";
                for ($j=0; $j < 4; $j++)
                    $ret.=$this->cases[$i][$j].", ";
                $ret.="}<br />";
            }

            return $ret;
        }

        public static function getCornerFromCoord(int $numRow, int $numCol):int
        {
            $ret = "";
            if($numRow == 0 || $numRow == 1)
                $ret.="N";
            else
                $ret.="S";

            if($numCol == 0 || $numCol == 1)
                $ret.="W";
            else
                $ret.="E";


            if(strpos($ret, "NW") !== false)
                return PlateauQuantik::NW;
            else if(strpos($ret, "NE") !== false)
                return PlateauQuantik::NE;
            else if(strpos($ret, "SW") !== false)
                return PlateauQuantik::SW;
            else if(strpos($ret, "SE") !== false)
                return PlateauQuantik::SE;
            else return -1;
        }
    }
?>

<html lang="fr">
    <head><title>PlateauQuantik</title></head>
    <body>
            <?php
                $p  = new PlateauQuantik();

                $p->setPiece(0, 0, PieceQuantik::initBlackCube());
                $p->setPiece(0, 1, PieceQuantik::initWhiteCylindre());
                $p->setPiece(0, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(0, 3, PieceQuantik::initBlackSphere());

                $p->setPiece(1, 0, PieceQuantik::initBlackCube());
                $p->setPiece(1, 1, PieceQuantik::initBlackCylindre());
                $p->setPiece(1, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(1, 3, PieceQuantik::initVoid());

                $p->setPiece(2, 0, PieceQuantik::initBlackCube());
                $p->setPiece(2, 1, PieceQuantik::initWhiteSphere());
                $p->setPiece(2, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(2, 3, PieceQuantik::initVoid());

                $p->setPiece(3, 0, PieceQuantik::initBlackCube());
                $p->setPiece(3, 1, PieceQuantik::initBlackSphere());
                $p->setPiece(3, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(3, 3, PieceQuantik::initVoid());

                echo($p->__toString()."<br />");


                echo($p->getCornerFromCoord(0,1));
                echo($p->getCornerFromCoord(2,1));
                echo($p->getCornerFromCoord(0,3));
                echo($p->getCornerFromCoord(3,3));

                echo("<br /><br />CORNER<br />");

                $a = new ActionQuantik($p);
                if($a->isCornerWin(0) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isCornerWin(1) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isCornerWin(2) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isCornerWin(3) == true) {echo ("yes<br />");} else {echo ("no<br />");}

                echo("<br /><br />ROW<br />");

                if($a->isRowWin(0) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isRowWin(1) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isRowWin(2) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isRowWin(3) == true) {echo ("yes<br />");} else {echo ("no<br />");}

                echo("<br /><br />COLUMN<br />");

                if($a->isColWin(0) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isColWin(1) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isColWin(2) == true) {echo ("yes<br />");} else {echo ("no<br />");}
                if($a->isColWin(3) == true) {echo ("yes<br />");} else {echo ("no<br />");}

                echo("<br />");

                echo(str_replace("\n", "<br/>", $a->__toString()));
            ?>
    </body>
</html>