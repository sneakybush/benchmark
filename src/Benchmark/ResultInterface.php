<?php

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

namespace Benchmark;

interface ResultInterface 
{
    public function setId ($id);
    public function setResourcesUsage ($usage);
    
    public function report ();
    public function getClone ();
}

