<?php
class ActionQuantik
{
    protected PlateauQuantik $plateauQuantik;

    public function __construct( PlateauQuantik $plateau)
    {
        $this->plateauQuantik = $plateau;
    }

    public function getPlateau():PlateauQuantik
    {
        return $this->plateauQuantik;
    }

    public function isRowWin( int $numRow ):bool
    {
        return $this->isComboWin($this->plateauQuantik->getRow($numRow));
    }

    public function isColWin( int $numCol ):bool
    {
        return $this->isComboWin($this->plateauQuantik->getCol($numCol));
    }

    public function isCornerWin( int $dir ):bool
    {
        return $this->isComboWin($this->plateauQuantik->getCorner($dir));
    }

    public function isValidPose(int $rowNum, int $colNum, PieceQuantik $piece ):bool
    {
        $corner = PlateauQuantik::getCornerFromCoord($rowNum, $colNum);

        if( !$this->isPiecevalide($this->plateauQuantik->getCol($colNum), $piece) ) return false;
        if( !$this->isPiecevalide($this->plateauQuantik->getRow($rowNum), $piece) ) return false;

        return $this->isPiecevalide($this->plateauQuantik->getCorner($corner), $piece);
    }

    public function posePiece( int $rowNum, int $colNum,  PieceQuantik $piece ):void
    {
        if( $this->isValidPose($rowNum, $colNum, $piece) )
            $this->plateauQuantik->setPiece($rowNum, $colNum, $piece);
    }

    public function __toString():string
    {
        $res = "";

        for ($cpt = 0; $cpt < PlateauQuantik::NBROWS; $cpt++ )
            $res .= "Ligne " . $cpt . ( ($this->isRowWin($cpt) ) ? " gagnante" : " perdante") . "\n";

        for ($cpt = 0; $cpt < PlateauQuantik::NBCOLS; $cpt++ )
            $res .= "Colonne " . $cpt . ( ($this->isColWin($cpt) ) ? " gagnante" : " perdante") . "\n";

        for ($cpt = 0; $cpt < 4; $cpt++ )
            $res .= "coté " . $cpt . ( ($this->isCornerWin($cpt) ) ? " gagnant" : " perdant") . "\n";

        return $res;
    }

    private function isComboWin( array $pieces ):bool
    {
        $tabPiece = array(false, false, false, false);

        for ($cpt = 0; $cpt < count($pieces); $cpt++)
        {
            $val = $pieces[$cpt]->getForme()-1;

            if( $val > -1 )
                $tabPiece[$val] = true;
            else
                return false;
        }

        foreach ( $tabPiece as $value )
            if( !$value )
                return false;

        return true;
    }

    private function isPiecevalide( array $pieces, PieceQuantik $p ):bool
    {
        for ($cpt = 0; $cpt < count($pieces); $cpt++)
            if ( $pieces[$cpt]->getForme() == $p->getForme() && $p->getCouleur() != $pieces[$cpt]->getCouleur() )
                return false;

        return true;
    }
}