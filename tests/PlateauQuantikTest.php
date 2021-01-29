<?php

require_once("../metier/PlateauQuantik.php");
require_once("../metier/PieceQuantik.php");
use PHPUnit\Framework\TestCase;

class PlateauQuantikTest extends TestCase
{
    public function test__construct()
    {
        $p = new PlateauQuantik();

        self::assertEquals(PieceQuantik::initVoid(), $p->getPieces(0, 0));
    }

    public function testSetPiece()
    {
        $p = new PlateauQuantik();

        $p->setPiece(1, 1, PieceQuantik::initBlackSphere());

        self::assertEquals(PieceQuantik::initBlackSphere(), $p->getPieces(1, 1));
    }
}
