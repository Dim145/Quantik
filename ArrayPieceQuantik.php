<?php
require_once ("PieceQuantik.php");

class ArrayPieceQuantik
{
    protected array $piecesQuantiks;
    protected int   $taille;

    public function __construct()
    {
        $this->piecesQuantiks = array();
        $this->taille         = 0;
    }

    public function __toString(): string
    {
        $res = "";

        foreach ($this->piecesQuantiks as $piece)
            $res .= $piece . ",";

        return $res;
    }

    public function getPieceQuantik( int $pos ): PieceQuantik
    {
        return $this->piecesQuantiks[$pos];
    }

    public function setPieceQuantik(int $pos, PieceQuantik $piece ):void
    {
        $this->piecesQuantiks[$pos] = $piece;
    }

    public function addPieceQuantik( PieceQuantik $piece ):void
    {
        $this->piecesQuantiks[$this->taille++] = $piece;
    }

    public function removePieceQuantik( int $pos ):void
    {
        unset($this->piecesQuantiks[$pos]);
        $this->piecesQuantiks = array_values($this->piecesQuantiks);
        $this->taille--;
    }

    public function getTaille(): int
    {
        return $this->taille;
    }

    public static function initPiecesNoires(): ArrayPieceQuantik
    {
        $array = new ArrayPieceQuantik();

        $array->addPieceQuantik(PieceQuantik::initBlackCube());
        $array->addPieceQuantik(PieceQuantik::initBlackCone());
        $array->addPieceQuantik(PieceQuantik::initBlackSphere());
        $array->addPieceQuantik(PieceQuantik::initBlackCylindre());

        return $array;
    }

    public static function initPiecesBlanches(): ArrayPieceQuantik
    {
        $array = new ArrayPieceQuantik();

        $array->addPieceQuantik(PieceQuantik::initWhiteCube());
        $array->addPieceQuantik(PieceQuantik::initWhiteCone());
        $array->addPieceQuantik(PieceQuantik::initWhiteSphere());
        $array->addPieceQuantik(PieceQuantik::initWhiteCylindre());

        return $array;
    }
}

?>