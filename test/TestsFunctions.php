<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");
    require_once ("../ActionQuantik.php");


    FonctionsUtiles::setPlateau( new PlateauQuantik() );
    FonctionsUtiles::getPlateau()->setPiece(0,0,PieceQuantik::initBlackCube());
    FonctionsUtiles::getPlateau()->setPiece(0,1,PieceQuantik::initWhiteCylindre());
    FonctionsUtiles::getPlateau()->setPiece(1,0,PieceQuantik::initBlackSphere());
    FonctionsUtiles::getPlateau()->setPiece(1,1,PieceQuantik::initWhiteCone());
    FonctionsUtiles::setPn(ArrayPieceQuantik::initPiecesNoires());
    FonctionsUtiles::setPb(ArrayPieceQuantik::initPiecesBlanches());
    FonctionsUtiles::setWhitePlay();

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
    echo "<br/>";
    echo FonctionsUtiles::getFormPlateauQuantik(FonctionsUtiles::getPlateauFromString(FonctionsUtiles::getPlateau()->__toString()), PieceQuantik::initBlackCone());


    echo FonctionsUtiles::getFinHTML();
?>