<?php
    session_start();

    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");

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
    echo FonctionsUtiles::getDivPiecesDisponibles(FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPn() : FonctionsUtiles::getPb());
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(FonctionsUtiles::getPlateau());
    echo "<br/>";
    echo FonctionsUtiles::getFormSelectionPiece(FonctionsUtiles::isWhitePlay() ? FonctionsUtiles::getPb() : FonctionsUtiles::getPn());
    echo FonctionsUtiles::getFinHTML();
?>