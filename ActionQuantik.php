<?php


class ActionQuantik
{
    protected PlateauQuantik $plateauQuantik;

    public function __construct()
    {
    }

    public function getPlateau():PlateauQuantik
    {
        return $this->plateauQuantik;
    }

    public function isRowWin( int $numRow ):bool
    {
        //                cube , cone , cylin, sphere
        $tabPiece = array(false, false, false, false);

        for ( $cpt = 0; $cpt < PlateauQuantik::NBCOLS; $cpt++)
        {
            $val = $this->plateauQuantik->getPieces($numRow, $cpt)->getForme()-1;

            if( $val > -1 )
                $tabPiece[$val] = true;
        }

        foreach ( $tabPiece as $value )
            if( !$value )
                return false;

        return true;
    }

    public function isColWin( int $numCol ):bool
    {
        //                cube , cone , cylin, sphere
        $tabPiece = array(false, false, false, false);

        for ( $cpt = 0; $cpt < PlateauQuantik::NBROWS; $cpt++)
        {
            $val = $this->plateauQuantik->getPieces($cpt, $numCol)->getForme()-1;

            if( $val > -1 )
                $tabPiece[$val] = true;
        }

        foreach ( $tabPiece as $value )
            if( !$value )
                return false;

        return true;
    }
}