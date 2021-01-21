<?php
    include ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");

    echo getDebutHTML();
    echo getFormSelectionPiece(ArrayPieceQuantik::initPiecesNoires());
    echo getFormSelectionPiece(ArrayPieceQuantik::initPiecesBlanches());
    echo "<br/>";
    echo getDivPlateauQuantik(new PlateauQuantik());
    echo getFinHTML();
?>