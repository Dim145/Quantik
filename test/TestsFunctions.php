<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");
    require_once ("../ActionQuantik.php");


    FonctionsUtiles::setPlateau( new PlateauQuantik() );
    FonctionsUtiles::getPlateau()->setPiece(0,0,PieceQuantik::initBlackCube());
    FonctionsUtiles::setPn(ArrayPieceQuantik::initPiecesNoires());
    FonctionsUtiles::setPb(ArrayPieceQuantik::initPiecesBlanches());

    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles(ArrayPieceQuantik::initPiecesNoires());
    echo "<br/>";
    echo FonctionsUtiles::getFormSelectionPiece(ArrayPieceQuantik::initPiecesNoires());
    echo FonctionsUtiles::getFormSelectionPiece(ArrayPieceQuantik::initPiecesBlanches());
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(new PlateauQuantik());
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(FonctionsUtiles::getPlateau());
    echo "<br/>";
    echo FonctionsUtiles::getFormPlateauQuantik(FonctionsUtiles::getPlateau(), PieceQuantik::initBlackCone());
    echo FonctionsUtiles::getFinHTML();
?>