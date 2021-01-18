<html lang="fr">
    <head><title>Test</title></head>
    <body>
            <?php
                include("../PlateauQuantik.php");
                include("../PieceQuantik.php");
                include("../ActionQuantik.php");
                
                $p  = new PlateauQuantik();

                echo(assert(PieceQuantik::initVoid(), $p->getPieces(0,0)));

                echo("<br />");
                

                $p->setPiece(0, 0, PieceQuantik::initBlackSphere());
                $p->setPiece(0, 1, PieceQuantik::initWhiteCylindre());
                $p->setPiece(0, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(0, 3, PieceQuantik::initBlackCube());

                $p->setPiece(1, 0, PieceQuantik::initBlackCube());
                $p->setPiece(1, 1, PieceQuantik::initBlackCylindre());
                $p->setPiece(1, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(1, 3, PieceQuantik::initBlackCone());

                $p->setPiece(2, 0, PieceQuantik::initWhiteCone());
                $p->setPiece(2, 1, PieceQuantik::initWhiteSphere());
                $p->setPiece(2, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(2, 3, PieceQuantik::initBlackSphere());

                $p->setPiece(3, 0, PieceQuantik::initBlackCube());
                $p->setPiece(3, 1, PieceQuantik::initBlackCylindre());
                $p->setPiece(3, 2, PieceQuantik::initWhiteCone());
                $p->setPiece(3, 3, PieceQuantik::initBlackCylindre());

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

                echo($a->__toString());
            ?>
    </body>
</html>