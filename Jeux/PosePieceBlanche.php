<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");
    require_once ("../ActionQuantik.php");

    session_start();
    /*if(! isset($_POST["plateau"]))
    {
        header('Location: SelectionPieceBlanche.php');
        exit();
    }*/

    getDivPiecesDisponibles($_POST["pb"]);

    getFormPlateauQuantik($_POST["plateau"]);

    getDivPiecesDisponibles($_POST["pn"]);

?>