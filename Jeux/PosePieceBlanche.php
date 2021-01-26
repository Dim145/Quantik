<?php
    require_once ("../FonctionsUtiles.php");
    require_once ("../ArrayPieceQuantik.php");
    require_once ("../PieceQuantik.php");
    require_once ("../PlateauQuantik.php");
    require_once ("../ActionQuantik.php");

    session_start();
    $_SESSION["plateau"] = new PlateauQuantik;
    $_SESSION["pb"]      = ArrayPieceQuantik::initPiecesBlanches();
    $_SESSION["pn"]      = ArrayPieceQuantik::initPiecesNoires();
    $_SESSION["piece"]   = PieceQuantik::initVoid();

    FonctionsUtiles::setPlateau($_SESSION['plateau']);
    FonctionsUtiles::setPb     ($_SESSION['pb']);
    FonctionsUtiles::setPn     ($_SESSION['pn']);

    if(! isset($_SESSION["plateau"]))
    {
        header('Location: SelectionPieceBlanche.php');
        exit();
    }

    if(isset($_POST["select"]))
    {
        $row = (int)substr($_POST["select"], 0,0);
        $col = (int)substr($_POST["select"], 2,2);
        (new ActionQuantik)->posePiece($row, $col, $_POST["piece"]);

        $_SESSION["isWhitePlay"] = ! $_SESSION["isWhitePlay"];
        /*if($_SESSION["isWhitePlay"])*/
            header('Location: PosePieceBlanche.php');
        /*else
            header('Location: SelectionPieceNoire.php');*/
        exit();
    }

    

    
    echo FonctionsUtiles::getDebutHTML();
    echo FonctionsUtiles::getDivPiecesDisponibles($_SESSION["pn"]);
    echo "<br/>";
    echo FonctionsUtiles::getFormPlateauQuantik($_SESSION["plateau"], $_POST["piece"]);
    echo "<br/>";
    echo FonctionsUtiles::getDivPiecesDisponibles($_SESSION["pb"]);
    echo FonctionsUtiles::getFinHTML();

?>