<?php

    function getDebutHTML():string
    {
        return "<!DOCTYPE html>
                <html lang=\"fr\">
                    <head>
                        <title>Quantik</title>
                        <link rel=\"stylesheet\" href=\"../style.css\">
                    </head>
                    <body>";
    }

    function getFinHTML():string
    {
        return "    </body>
                </html>";
    }

    function getDivPiecesDisponibles( ArrayPieceQuantik $pieces ):string
    {
        $sRet = "<div>";

        for ( $cpt = 0; $cpt < $pieces->getTaille(); $cpt++ )
            $sRet .= "<button type=\"submit\" name=\"active\" disabled>" . $pieces->getPieceQuantik($cpt) . "</button>";

        return $sRet . "</div>";
    }

    function getFormSelectionPiece( ArrayPieceQuantik $pieces ):string
    {
        $sRet = "<form action=\"\" method=\"post\">";

        for ( $cpt = 0; $cpt < $pieces->getTaille(); $cpt++ )
            $sRet .= "<button type=\"submit\" name=\"select\" value='$cpt' >" . $pieces->getPieceQuantik($cpt) . "</button>";

        $sRet .= "
                </form>";

        return $sRet;
    }

    function getDivPlateauQuantik(PlateauQuantik $plateau):string
    {
        $sRet = "<div>";

        for ( $cptR = 0; $cptR < $plateau::NBROWS; $cptR++ )
        {
            for ($cptC = 0; $cptC < $plateau::NBCOLS; $cptC++)
                $sRet .= "<button type=\"submit\" name=\"active\"  disabled>" . $plateau->getPieces($cptR, $cptC) . "</button>";

            $sRet .= "<br/>";
        }

        return $sRet . "</div>";
    }

    
    function getFormPlateauQuantik(PlateauQuantik $plateau, PieceQuantik $piece):string
    {
        $sRet = "<form action=\"\" method=\"post\">";
        for ( $cptR = 0; $cptR < $plateau::NBROWS; $cptR++ )
        {
            for ($cptC = 0; $cptC < $plateau::NBCOLS; $cptC++)
                if($plateau->getPieces($cptR, $cptC) == PieceQuantik::initVoid())
                    $sRet .= "<button type=\"submit\" name=\"select\" value=\"".($cptR."-".$cptC)."\" >" . $plateau->getPieces($cptR, $cptC) . "</button>";
                else
                    $sRet .= "<button type=\"submit\" name=\"select\" value=\"".($cptR."-".$cptC)."\" disabled>" . $plateau->getPieces($cptR, $cptC) . "</button>";

            $sRet .= "<br/>";
        }

        return $sRet . "</form>";
    }

    /*
    QUESTION 7

    QUESTION 8
        On aurais un toolkit remplis de methode static et non de fonctions
    */
?>


