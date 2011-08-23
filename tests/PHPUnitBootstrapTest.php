<?php
/**
 * Test case for validating that the PHPUnit bootstrap runs correctly.
 */
class PHPUnitBootstrapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function bootstrapShouldRunCorrectly()
    {
        $this->assertTrue(true);
    }
}