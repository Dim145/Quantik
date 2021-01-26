<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");
    require_once ("../ActionQuantik.php");

    session_start();
    /*$_SESSION["plateau"] = new PlateauQuantik;
    $_SESSION["pb"]      = ArrayPieceQuantik::initPiecesBlanches();
    $_SESSION["pn"]      = ArrayPieceQuantik::initPiecesNoires();
    $_SESSION["piece"]   = PieceQuantik::initVoid();*/
    /*if(! isset($_SESSION["plateau"]))
    {
        header('Location: SelectionPiece.php');
        exit();
    }*/

    if(isset($_POST["select"]))
    {
        $row = (int)substr($_POST["select"], 0,0);
        $col = (int)substr($_POST["select"], 2,2);
        $_SESSION["plateau"]->posePiece($row, $col, $_SESSION["piece"]);
        header('Location: SelectionPiece.php');
        exit();
    }

    FonctionsUtiles::setPlateau($_SESSION['plateau']);
    FonctionsUtiles::setPb     ($_SESSION['pb']);
    FonctionsUtiles::setPn     ($_SESSION['pn']);

    
    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles($_SESSION["pn"]);
    echo "<br/>";
    echo FonctionsUtiles::getFormPlateauQuantik($_SESSION["plateau"], $_POST["piece"]);
    echo "<br/>";
    echo FonctionsUtiles::getDivPiecesDisponibles($_SESSION["pb"]);
    echo FonctionsUtiles::getFinHTML();

?>