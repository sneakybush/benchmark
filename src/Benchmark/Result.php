<?php

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

namespace Benchmark;

class Result implements ResultInterface
{
    private $_id, $_time = 0;
    
    public function getClone ()
    {
        return clone $this;
    }

    public function report ()
    {
        return "Started '{$this->_id}': took {$this->_time} to perform \n";
    }

    public function setId ($id)
    {
        $this->_id = $id;
    }

    public function setTimeUsed ($time)
    {
        $this->_time = $time;
    }
}
