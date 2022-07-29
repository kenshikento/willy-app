<?php

namespace Tests\Unit;

use App\Service\WillyWonkaFactory;
use PHPUnit\Framework\TestCase;

class WillyWonkaFactoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    
    public function test_expected_numbers_is_250_true()
    {
    	$input = 250;

    	$test = collect((new WillyWonkaFactory)->get($input));
    	
    	$expectedResult = 250;

    	$result = $test->filter(fn($collection) => in_array($expectedResult, $collection));

    	$this->assertTrue($result->isNotEmpty());
    }

    public function test_expected_numbers_is_251_true()
    {
    	$input = 251;

    	$test = collect((new WillyWonkaFactory)->get($input));
    	
    	$expectedResult = 500;

    	$result = $test->filter(fn($collection) => in_array($expectedResult, $collection));

    	$this->assertTrue($result->isNotEmpty());
    }

    public function test_expected_numbers_is_501_true()
    {
    	$input = 501;

    	$test = collect((new WillyWonkaFactory)->get($input));
    	
    	$expectedResult = 250;

    	$result = $test->filter(fn($collection) => in_array($expectedResult, $collection));

    	$this->assertTrue($result->isNotEmpty());
    }

    public function test_expected_numbers_is_12001_true()
    {
    	$input = 12001;

    	$test = collect((new WillyWonkaFactory)->get($input));
    	
    	$expectedResult = 5000;

    	$result = $test->filter(fn($collection) => in_array($expectedResult, $collection));

    	$this->assertTrue($result->isNotEmpty());
    }

    public function test_expected_numbers_to_501_fail()
    {
    	$input = 501;

    	$test = collect((new WillyWonkaFactory)->get($input));
    	
    	$expectedNotResult = 1000;

    	$result = $test->filter(fn($collection) => in_array($expectedNotResult, $collection));

    	$this->assertTrue($result->isEmpty());
    }

    public function test_expected_numbers_to_251_fail()
    {
    	$input = 251;

    	$test = collect((new WillyWonkaFactory)->get($input));
    	
    	$expectedNotResult = 250;

    	$result = $test->filter(fn($collection) => in_array($expectedNotResult, $collection));

    	$this->assertTrue($result->isEmpty());
    }
}
