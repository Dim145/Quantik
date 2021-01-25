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

    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles(FonctionsUtiles::getPn());
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(FonctionsUtiles::getPlateau());
    echo "<br/>";
    echo FonctionsUtiles::getFormSelectionPiece(FonctionsUtiles::getPb());
    echo FonctionsUtiles::getFinHTML();
?>