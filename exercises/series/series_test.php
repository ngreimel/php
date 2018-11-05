<?php
require "series.php";

class SeriesTest extends PHPUnit\Framework\TestCase
{
    public function testSlicesOfOne()
    {
        $this->assertEquals(
            ["0", "1", "2", "3", "4"],
            slices("01234", 1)
        );
    }

    public function testSlicesOfTwo()
    {
        $this->assertEquals(
            ["97", "78", "86", "67", "75", "56", "64"],
            slices("97867564", 2)
        );
    }

    public function testSlicesOfThree()
    {
        $this->assertEquals(
            ["978", "786", "867", "675", "756", "564"],
            slices("97867564", 3)
        );
    }

    public function testSlicesOfFour()
    {
        $this->assertEquals(
            ["0123", "1234"],
            slices("01234", 4)
        );
    }

    public function testSlicesOfFive()
    {
        $this->assertEquals(
            ["01234"],
            slices("01234", 5)
        );
    }

    public function testOverlyLongSlice()
    {
        $this->expectException(Exception::class);
        slices("012", 4);
    }

    public function testOverlyShortSlice()
    {
        $this->expectException(Exception::class);
        slices("01234", 0);
    }
}
