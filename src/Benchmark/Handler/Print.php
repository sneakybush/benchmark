<?php

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

namespace Benchmark\Handler;

// this one is actually pretty...useless | don't recommend ever using it
class PrintHandler implements HandlerInterface
{
    private $_resultCollection = [];
    
    public function append (\Benchmark\ResultInterface $result)
    {
        $this->_resultCollection [] = $result;
    }

    public function persist ()
    {
        // you might want to customise this one
        foreach ($this->_resultCollection as $result)
        {
            print $result->report ();
        }
    }
    
    public function setBenchmarkId ($id)
    {
        // no implementation needed
    }
}