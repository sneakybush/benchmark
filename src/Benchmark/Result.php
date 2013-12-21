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
    private $_id, $_usage;
    
    public function getClone ()
    {
        return clone $this;
    }

    public function report ()
    {
        return "Started '{$this->_id}': took {$this->_usage} to perform \n";
    }

    public function setId ($id)
    {
        $this->_id = $id;
    }

    public function setResourcesUsage ($usage)
    {
        $this->_usage = $usage;
    }
}
