<?php

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

namespace Benchmark\Handler;

interface HandlerInterface
{
    public function append (\Benchmark\ResultInterface $result);
    public function persist ();
}

