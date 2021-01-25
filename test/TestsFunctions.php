<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");

    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles(ArrayPieceQuantik::initPiecesNoires());
    echo "<br/>";
    echo FonctionsUtiles::getFormSelectionPiece(ArrayPieceQuantik::initPiecesNoires());
    echo FonctionsUtiles::getFormSelectionPiece(ArrayPieceQuantik::initPiecesBlanches());
    echo "<br/>";
    echo FonctionsUtiles::getDivPlateauQuantik(new PlateauQuantik());
    echo "<br/>";
    $plateau = new PlateauQuantik();
    $plateau->setPiece(0,0,PieceQuantik::initBlackCube());
    echo FonctionsUtiles::getDivPlateauQuantik($plateau);
    echo "<br/>";
    echo FonctionsUtiles::getFormPlateauQuantik($plateau, PieceQuantik::initBlackCone());
    echo FonctionsUtiles::getFinHTML();
?>