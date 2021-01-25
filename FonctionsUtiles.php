<?php
    

    class FonctionsUtiles
    {
        private static PlateauQuantik $plateau;
        private static ArrayPieceQuantik $pb;
        private static ArrayPieceQuantik $pn;
        private static bool              $isWhitePlay;

        static function getDebutHTML():string
        {
            return "<!DOCTYPE html>
                <html lang=\"fr\">
                    <head>
                        <title>Quantik</title>
                        <link rel=\"stylesheet\" href=\"../style.css\">
                    </head>
                    <body>";
        }

        static function getFinHTML():string
        {
            return "    </body>
                </html>";
        }

        static function getDivPiecesDisponibles( ArrayPieceQuantik $pieces ):string
        {
            $sRet = "<div>";

            for ( $cpt = 0; $cpt < $pieces->getTaille(); $cpt++ )
                $sRet .= "<button type=\"submit\" name=\"active\" disabled>" . $pieces->getPieceQuantik($cpt) . "</button>";

            return $sRet . "</div>";
        }

        static function getFormSelectionPiece( ArrayPieceQuantik $pieces ):string
        {
            $sRet = "<form action=\"\" method=\"post\">";

            for ( $cpt = 0; $cpt < $pieces->getTaille(); $cpt++ )
                $sRet .= "<button type=\"submit\" name=\"select\" value='$cpt' >" . $pieces->getPieceQuantik($cpt) . "</button>";

            $sRet .= "<input type=\"hidden\" value=\"" . FonctionsUtiles::$plateau . "\" name=\"plateau\">";
            $sRet .= "<input type=\"hidden\" value=\"" . FonctionsUtiles::$pb . "\" name=\"pb\">";
            $sRet .= "<input type=\"hidden\" value=\"" . FonctionsUtiles::$pn . "\" name=\"pn\">";

            $sRet .= "
                </form>";

            return $sRet;
        }

        static function getDivPlateauQuantik(PlateauQuantik $plateau):string
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


        static function getFormPlateauQuantik(PlateauQuantik $plateau, PieceQuantik $piece):string
        {
            $sRet = "<form action=\"\" method=\"post\">";
            for ( $cptR = 0; $cptR < $plateau::NBROWS; $cptR++ )
            {
                for ($cptC = 0; $cptC < $plateau::NBCOLS; $cptC++)
                    if((new ActionQuantik($plateau))->isValidPose($cptR, $cptC, $piece) || $plateau->getPieces($cptR, $cptC) == PieceQuantik::initVoid())
                        $sRet .= "<button type=\"submit\" name=\"select\" value=\"".($cptR."-".$cptC)."\" >" . $plateau->getPieces($cptR, $cptC) . "</button>";
                    else
                        $sRet .= "<button type=\"submit\" name=\"select\" value=\"".($cptR."-".$cptC)."\" disabled>" . $plateau->getPieces($cptR, $cptC) . "</button>";

                $sRet .= "<br/>";
            }

            $sRet .= "<input type=\"hidden\" value=\"" . FonctionsUtiles::$plateau . "\" name=\"plateau\">";
            $sRet .= "<input type=\"hidden\" value=\"" . FonctionsUtiles::$pb . "\" name=\"pb\">";
            $sRet .= "<input type=\"hidden\" value=\"" . FonctionsUtiles::$pn . "\" name=\"pn\">";

            return $sRet . "</form>";
        }

        /**
         * @return array
         */
        public static function getPlateau(): PlateauQuantik
        {
            return self::$plateau;
        }

        /**
         * @param array $plateau
         */
        public static function setPlateau(PlateauQuantik $plateau): void
        {
            self::$plateau = $plateau;
        }

        /**
         * @return array
         */
        public static function getPb(): ArrayPieceQuantik
        {
            return self::$pb;
        }

        /**
         * @param array $pb
         */
        public static function setPb(ArrayPieceQuantik $pb): void
        {
            self::$pb = $pb;
        }

        /**
         * @return array
         */
        public static function getPn(): ArrayPieceQuantik
        {
            return self::$pn;
        }

        /**
         * @param array $pn
         */
        public static function setPn(ArrayPieceQuantik $pn): void
        {
            self::$pn = $pn;
        }

        /**
         * @return bool
         */
        public static function isWhitePlay(): bool
        {
            return self::$isWhitePlay;
        }

        public static function setWhitePlay(): void
        {
            self::$isWhitePlay = true;
        }

        public static function setBlackPlay(): void
        {
            self::$isWhitePlay = false;
        }
    }

    /*
    QUESTION 7
        C'est un Cube:
        -   Cube ou Cone première ligne
        -   Cube, Sphère ou Cylindre a la seconde.
        Donc Cube. (celui en communs aux deux lignes)

    QUESTION 8
        On aurais un toolkit remplis de methode static => class utilitaire
    */
?>


