include <pieceQuantik.php>;

<?php

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
            $this->cases = array(array(null,null,null,null), array(null,null,null,null), array(null,null,null,null), array(null,null,null,null));
        }

        public function getPieces(int $numRow, int $numCol)
        {
            return $this->cases[$numRow][$numCol];
        }

        public function setPiece(int $numRow, int $numCol, PieceQuantik $p)
        {
            $this->cases[$numRow][$numCol] = $p;
        }

        public function getRow(int $numRow)
        {
            return array($this->cases[$numRow][0], $this->cases[$numRow][1], $this->cases[$numRow][2], $this->cases[$numRow][3]);
        }

        public function getCol(int $numCol)
        {
            return array($this->cases[0][$numCol], $this->cases[1][$numCol], $this->cases[2][$numCol], $this->cases[3][$numCol]);
        }

        public function getCorner(int $dir)
        {
            if($dir == PlateauQuantik::NW)
                return array($this->cases[0][0], $this->cases[0][1], $this->cases[1][0], $this->cases[1][1]);
            else if($dir == PlateauQuantik::NE)
                return array($this->cases[0][2], $this->cases[0][3], $this->cases[1][2], $this->cases[1][3]);
            else if($dir == PlateauQuantik::SW)
                return array($this->cases[2][0], $this->cases[2][1], $this->cases[3][0], $this->cases[3][1]);
            else if($dir == PlateauQuantik::SE)
                return array($this->cases[2][2], $this->cases[2][3], $this->cases[3][2], $this->cases[3][3]);
        }

        public function __toString()
        {
            $ret = "";
            for ($i=0; $i < 4; $i++)
            { 
                for ($j=0; $j < 4; $j++)
                    $ret."{".$this->cases[$i][$j].", ";
                $ret."}\n";
            }
        }

        public function getCornerFromCorner(int $numRow, int $numCol)
        {
            $ret = "";
            if($numRow == 0 || $numRow == 1)
                $ret."N";
            else
                $ret."S";

            if($numCol == 0 || $numCol == 1)
                $ret."W";
            else
                $ret."E";

            if(str_contains($ret, "NW"))
                return PlateauQuantik::NW;
            else if(str_contains($ret, "NE"))
                return PlateauQuantik::NE;
            else if(str_contains($ret, "SW"))
                return PlateauQuantik::SW;
            else if(str_contains($ret, "SE"))
                return PlateauQuantik::SE;
        }
    }
?>