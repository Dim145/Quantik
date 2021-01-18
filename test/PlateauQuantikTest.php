<?php

require_once ("../PlateauQuantik.php");
require_once ("../PieceQuantik.php");
use PHPUnit\Framework\TestCase;

class PlateauQuantikTest extends TestCase
{
    public function test__construct()
    {
        $p = new PlateauQuantik();

        self::assertEquals(PieceQuantik::initVoid(), $p->getPieces(0, 0));
    }
}
