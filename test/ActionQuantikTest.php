<?php

require_once ("../PlateauQuantik.php");
require_once ("../PieceQuantik.php");
require_once ("../ActionQuantik.php");
use PHPUnit\Framework\TestCase;

class ActionQuantikTest extends TestCase
{

    public function testIsRowWin()
    {
        $a = new ActionQuantik(new PlateauQuantik());

        $a->posePiece(0, 0, PieceQuantik::initBlackCube());
        $a->posePiece(0, 1, PieceQuantik::initWhiteSphere());
        $a->posePiece(0, 2, PieceQuantik::initBlackCone());
        $a->posePiece(0, 3, PieceQuantik::initWhiteCylindre());

        self::assertTrue ($a->isRowWin(0));
        self::assertFalse($a->isRowWin(1));
    }

    public function testIsValidPose()
    {
        $p = new PlateauQuantik();
        $a = new ActionQuantik($p);

        $p->setPiece(0, 0, PieceQuantik::initBlackCube());
        $p->setPiece(0, 1, PieceQuantik::initWhiteSphere());
        $p->setPiece(0, 2, PieceQuantik::initBlackCone());

        self::assertTrue ($a->isValidPose(0, 3, PieceQuantik::initWhiteCylindre()));
        self::assertFalse($a->isValidPose(0, 3, PieceQuantik::initBlackCube()));
    }
}
