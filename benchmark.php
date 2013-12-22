<?php

error_reporting (-1);
ini_set ('display_errors', true);

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

require_once __DIR__ . '/vendor/autoload.php';

use Benchmark\Handler\FileHandler;
use Benchmark\Benchmark;
use Benchmark\Result;

function factorial ($number)
{
    if (1 === $number)
    {
        return $number;
    }
    
    return factorial ($number - 1) * $number;
}

/* @var $benchmark Benchmark */
$benchmark = Benchmark::create ('factorial', new Result ());
$benchmark->pushHandler (new FileHandler ());

$benchmark->start ('factorial of 10');

    $data = factorial (10);

$benchmark->end ();

$benchmark->report ();
