<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");
    require_once ("../ActionQuantik.php");

    session_start();
    /*$_SESSION["plateau"] = new PlateauQuantik;
    $_SESSION["pb"]      = ArrayPieceQuantik::initPiecesBlanches();
    $_SESSION["pn"]      = ArrayPieceQuantik::initPiecesNoires();
    $_SESSION["piece"]   = PieceQuantik::initVoid();*/
    if(! isset($_SESSION["plateau"]))
    {
        header('Location: SelectionPiece.php');
        exit();
    }

    FonctionsUtiles::setPlateau($_SESSION['plateau']);
    FonctionsUtiles::setPb     ($_SESSION['pb']);
    FonctionsUtiles::setPn     ($_SESSION['pn']);

    if( isset($_SESSION['isWhitePlay']) )
    {
        if($_SESSION['isWhitePlay']) FonctionsUtiles::setWhitePlay();
        else                         FonctionsUtiles::setBlackPlay();
    }
    else
    {
        FonctionsUtiles::setWhitePlay();
    }

    $tab = FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPb() : FonctionsUtiles::getPn();

    if(isset($_POST["select"]))
    {
        $indice = $_SESSION['pieceBis'];

        $row = intval(substr($_POST["select"], 0,1));
        $col = intval(substr($_POST["select"], 2,1));

        $actionQuantik = new ActionQuantik(FonctionsUtiles::getPlateau());

        if( $actionQuantik->isValidPose($row, $col, $tab->getPieceQuantik($indice)))
        {
            $actionQuantik->posePiece($row, $col, $tab->getPieceQuantik($indice));
            $tab->removePieceQuantik($indice);
            $_SESSION['isWhitePlay'] = !FonctionsUtiles::isWhitePlay();
        }
        

        $_SESSION["plateau"] = FonctionsUtiles::getPlateau();
        $_SESSION["pb"]      = FonctionsUtiles::getPb();
        $_SESSION["pn"]      = FonctionsUtiles::getPn();

        if( FonctionsUtiles::isPartieTerminer() )
        {
            echo FonctionsUtiles::getPage_Victoire();
            exit();
        }

        header('Location: SelectionPiece.php');
        exit();
    }
    else
    {
        $_SESSION['pieceBis'] = intval($_POST["piece"]);
    }
    
    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles(FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPn() : FonctionsUtiles::getPb(), !$_SESSION['isWhitePlay']);
    echo "<br/>";
    echo FonctionsUtiles::getFormPlateauQuantik($_SESSION["plateau"], $tab->getPieceQuantik(intval($_POST["piece"])) );
    echo "<br/>";
    echo FonctionsUtiles::getDivPiecesDisponibles(FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPb() : FonctionsUtiles::getPn(), $_SESSION['isWhitePlay'], $tab->getPieceQuantik(intval($_POST["piece"])));
    echo FonctionsUtiles::getFormBoutonAnnuler();
    echo FonctionsUtiles::getLienRecommencer();
    echo FonctionsUtiles::getFinHTML();

?>