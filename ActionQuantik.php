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

    public function isValidePose( int $rowNum, int $colNum, PieceQuantik $piece ):bool
    {
        $corner = 0;

        if( $rowNum <  PlateauQuantik::NBROWS and $colNum <  PlateauQuantik::NBCOLS ) $corner = 0;
        if( $rowNum <  PlateauQuantik::NBROWS and $colNum >= PlateauQuantik::NBCOLS ) $corner = 1;
        if( $rowNum >= PlateauQuantik::NBROWS and $colNum >= PlateauQuantik::NBCOLS ) $corner = 2;
        if( $rowNum >= PlateauQuantik::NBROWS and $colNum <  PlateauQuantik::NBCOLS ) $corner = 3;

        if( !$this->isPiecevalide($this->plateauQuantik->getCol($colNum), $piece) ) return false;
        if( !$this->isPiecevalide($this->plateauQuantik->getRow($rowNum), $piece) ) return false;

        return $this->isPiecevalide($this->plateauQuantik->getCorner($corner), $piece);
    }

    public function posePiece( int $rowNum, int $colNum,  PieceQuantik $piece ):void
    {
        if( $this->isValidePose($rowNum, $colNum, $piece) )
            $this->plateauQuantik->setPiece($rowNum, $colNum, $piece);
        else
            echo 'mouvement invalide';
    }

    public function __toString():string
    {
        // TODO: JSP QUOI FAIRE

        return $this->plateauQuantik->__toString();
    }

    private function isComboWin( array $pieces ):bool
    {
        $tabPiece = array(false, false, false, false);

        for ($cpt = 0; $cpt < count($pieces); $cpt++)
        {
            $val = $pieces[$cpt]->getForme()-1;

            if( $val > -1 )
                $tabPiece[$val] = true;
        }

        foreach ( $tabPiece as $value )
            if( !$value )
                return false;

        return true;
    }

    private function isPiecevalide( array $pieces, PieceQuantik $p ):bool
    {
        for ($cpt = 0; $cpt < count($pieces); $cpt++)
            if ($pieces[$cpt]->getForme() == $p->getForme() && $p->getCouleur() != $pieces[$cpt]->getCouleur() )
                return false;

        return true;
    }
}