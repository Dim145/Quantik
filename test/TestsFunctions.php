<?php
    include ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");

    echo getDebutHTML();
    echo getDivPiecesDisponibles(ArrayPieceQuantik::initPiecesNoires());
    echo "<br/>";
    echo getFormSelectionPiece(ArrayPieceQuantik::initPiecesNoires());
    echo getFormSelectionPiece(ArrayPieceQuantik::initPiecesBlanches());
    echo "<br/>";
    echo getDivPlateauQuantik(new PlateauQuantik());
    echo "<br/>";
    $plateau = new PlateauQuantik();
    $plateau->setPiece(0,0,PieceQuantik::initBlackCube());
    echo getDivPlateauQuantik($plateau);
    echo "<br/>";
    echo getFormPlateauQuantik($plateau, PieceQuantik::initBlackCone());
    echo getFinHTML();
?>