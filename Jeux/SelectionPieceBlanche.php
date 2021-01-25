<?php
    include ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");

    FonctionsUtiles::setPlateau( isset($_POST['plateau']) ? $_POST['plateau'] : new PlateauQuantik() );
    FonctionsUtiles::setPb     ( isset($_POST['pb'])      ? $_POST['pb']      : ArrayPieceQuantik::initPiecesBlanches() );
    FonctionsUtiles::setPn     ( isset($_POST['pn'])      ? $_POST['pn']      : ArrayPieceQuantik::initPiecesNoires() );

    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles(FonctionsUtiles::getPn());
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(FonctionsUtiles::getPlateau());
    echo "<br/>";
    echo FonctionsUtiles::getFormSelectionPiece(FonctionsUtiles::getPb());
    echo FonctionsUtiles::getFinHTML();
?>