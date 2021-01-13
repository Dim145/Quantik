<?php

include "pieceQuantik.php";

class PlateauQuantik
{
    public const NBROWS = 4;
    public const NBCOLS = 4;
    public const NW = 0;
    public const NE = 1;
    public const SW = 2;
    public const SE = 3;
    PROTECTED $case;

    public function __construct()
    {
        $this->cases = array(array(null,null,null,null), array(null,null,null,null), array(null,null,null,null), array(null,null,null,null));
    }

    public function getPieces(int $numRow, int $numCol)
    {
        return $this->case[$numRow][$numCol];
    }

    public function setPiece(int $numRow, int $numCol, PieceQuantik $p)
    {
        $this->case[$numRow][$numCol] = $p;
    }

    public function getRow(int $numRow)
    {
        return array($this->case[$numRow][0], $this->case[$numRow][1], $this->case[$numRow][2], $this->case[$numRow][3]);
    }

    public function getCol(int $numCol)
    {
        return array($this->case[0][$numCol], $this->case[1][$numCol], $this->case[2][$numCol], $this->case[3][$numCol]);
    }

    public function getCorner(int $dir)
    {
        if($dir == PlateauQuantik::NW)
            return array($this->case[0][0], $this->case[0][1], $this->case[1][0], $this->case[1][1]);
        else if($dir == PlateauQuantik::NE)
            return array($this->case[0][2], $this->case[0][3], $this->case[1][2], $this->case[1][3]);

        return null;
    }


}
?>