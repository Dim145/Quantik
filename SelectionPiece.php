<?php
    require_once("./metier/FonctionsUtiles.php");
    require_once("./metier/ArrayPieceQuantik.php");
    require_once("./metier/PieceQuantik.php");
    require_once("./metier/PlateauQuantik.php");

    session_start();

    if (isset($_GET['reset']))
    {
        unset($_SESSION['plateau']);
        unset($_SESSION['pb']);
        unset($_SESSION['pn']);
        unset($_SESSION['isWhitePlay']);
        unset($_SESSION['pieceBis']);
    }

    FonctionsUtiles::setPlateau( isset($_SESSION['plateau']) ? $_SESSION['plateau'] : new PlateauQuantik() );
    FonctionsUtiles::setPb     ( isset($_SESSION['pb'])      ? $_SESSION['pb']      : ArrayPieceQuantik::initPiecesBlanches() );
    FonctionsUtiles::setPn     ( isset($_SESSION['pn'])      ? $_SESSION['pn']      : ArrayPieceQuantik::initPiecesNoires() );

    if( isset($_SESSION['isWhitePlay']) )
    {
        if($_SESSION['isWhitePlay']) FonctionsUtiles::setWhitePlay();
        else                         FonctionsUtiles::setBlackPlay();
    }
    else
    {
        FonctionsUtiles::setWhitePlay();
    }

    $_SESSION['plateau']     = FonctionsUtiles::getPlateau();
    $_SESSION['pb']          = FonctionsUtiles::getPb();
    $_SESSION['pn']          = FonctionsUtiles::getPn();
    $_SESSION['isWhitePlay'] = FonctionsUtiles::isWhitePlay();

    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles(FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPn() : FonctionsUtiles::getPb(), !$_SESSION['isWhitePlay']);
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(FonctionsUtiles::getPlateau());
    echo "<br/>";
    echo FonctionsUtiles::getFormSelectionPiece(FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPb() : FonctionsUtiles::getPn(), $_SESSION['isWhitePlay']);
    echo FonctionsUtiles::getLienRecommencer();
    echo FonctionsUtiles::getFinHTML();
?>