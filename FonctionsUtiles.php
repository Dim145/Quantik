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
            $sRet = "<form action=\"./PosePieceBlanche.php\" method=\"post\">";

            for ( $cpt = 0; $cpt < $pieces->getTaille(); $cpt++ )
                $sRet .= "<button type=\"submit\" name=\"piece\" value=\"".$cpt."\" >" . $pieces->getPieceQuantik($cpt) . "</button>";

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

            return $sRet . "</form>";
        }

        /**
         * @return string
         */
        public static function getFormBoutonAnnuler() : string
        {
            return "<button><a href=\"".$_SERVER['HTTP_REFERER']."\">annuler</a></button>";
        }

        /**
         * @param int $couleur
         * @return string
         */
        public static function getDivMessageVictoire(int $couleur) : string {
            /* TODO div annonçant la couleur victorieuse et proposant un lien pour recommencer une nouvelle partie */
            $resultat ="";
            return $resultat;
        }

        /**
         * @return string
         */
        public static function getLienRecommencer():string
        {
            return "<p><a href=\"./SelectionPiece.php?reset\">Recommencer ?</a></p>";
        }

        static function getPlateauFromString( string $toString ): PlateauQuantik
        {
            $plateau = new PlateauQuantik();

            $tabStringLigne = explode("<br />", $toString);

            for ( $cptR = 0; $cptR < count($tabStringLigne); $cptR++ )
            {
                $tabCases = explode(", ", substr($tabStringLigne[$cptR], 1, strlen($tabStringLigne[$cptR])-1));

                for ( $cptC = 0; $cptC < count($tabCases); $cptC++ )
                {
                    echo $tabCases[$cptC];
                    $case = $tabCases[$cptC];

                    if( strpos($case, 'B') )
                    {
                        if( strpos($case, 'Cy') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initBlackCylindre());
                        if( strpos($case, 'Cu') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initBlackCube());
                        if( strpos($case, 'Sp') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initBlackSphere());
                        if( strpos($case, 'Co') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initBlackCone());
                        if( strpos($case, 'Vo') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initVoid());
                    }
                    else
                    {
                        if( strpos($case, 'Cy') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initWhiteCylindre());
                        if( strpos($case, 'Cu') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initWhiteCube());
                        if( strpos($case, 'Sp') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initWhiteSphere());
                        if( strpos($case, 'Co') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initWhiteCone());
                        if( strpos($case, 'Vo') ) $plateau->setPiece($cptR, $cptC, PieceQuantik::initVoid());
                    }
                }
            }

            return $plateau;
        }

        static function getPiecesFromString( string $toString ): ArrayPieceQuantik
        {
            $array = new ArrayPieceQuantik();



            return $array;
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

        public static function getPage_Victoire(): string
        {
            $sret = self::getDebutHTML();

            $sret .= "<h1>Les " . (self::$isWhitePlay ? " noirs" : "blancs" ) . " ont gagnés</h1>";
            $sret .= self::getLienRecommencer();

            return $sret . self::getFinHTML();
        }

        public static function isPartieTerminer(): bool
        {
            $action = new ActionQuantik(self::getPlateau());

            for ( $cpt = 0; $cpt < PlateauQuantik::NBROWS; $cpt++ )
                if( $action->isRowWin($cpt) )
                    return true;

            for ( $cpt = 0; $cpt < PlateauQuantik::NBCOLS; $cpt++ )
                if( $action->isColWin($cpt) )
                    return true;

            for ( $cpt = 0; $cpt < 4; $cpt++ )
                if( $action->isCornerWin($cpt) )
                    return true;

            return false;
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


