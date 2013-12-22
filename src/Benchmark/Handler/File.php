<?php

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

namespace Benchmark\Handler;

class FileHandler implements HandlerInterface
{
    private $_resultCollection = [];
    
    private $_outputFile, $_benchmarkId;
    
    public function append (\Benchmark\ResultInterface $result)
    {
        $this->_resultCollection [] = $result;
    }
    
    public function setOutputFile ($file)
    {
        if (is_readable ($file) && is_writeable ($file))
        {
            $this->_outputFile = $file;
            return true;
        }
        
        throw new \RuntimeException ();
    }

    public function persist ()
    {
        if (! $this->_outputFile)
        {
            throw new \BadMethodCallException ();
        }
        
        $data = implode ('', array_map (function ($result) 
        {
           
            return $result->report ();
            
        }, $this->_resultCollection));
        
        file_put_contents ($this->_outputFile, $data, FILE_APPEND);
    }
    
    public function setBenchmarkId ($id)
    {
        $this->setOutputFile (__DIR__ . "/../../../data/{$id}.txt");
        $this->_benchmarkId = $id;
    }
}
