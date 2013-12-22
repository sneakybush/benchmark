<?php

/*
 * PHP Benchmark library
 * 
 * Licensed under the MIT license
 * Check LICENSE file for more info
 */

namespace Benchmark;

class Benchmark
{
    private $_id, $_dataDir, $_resultObj, $_handlerStack;
    
    private $_results = [];
    
    private $_currentId = null, $_currentTime = 0;
    
    public static function create ($id, $dataDir, $resultObj)
    {
        $instance = (new static ($id, $dataDir, $resultObj));
        return $instance;
    }
    
    public function __construct ($id, $dataDir, ResultInterface $resultObj)
    {
        $this->_handlerStack = new \SplStack ();
        // just to make it obvious & easy to change
        $this->_handlerStack->setIteratorMode (
            \SplDoublyLinkedList::IT_MODE_FIFO
                | \SplDoublyLinkedList::IT_MODE_KEEP
        );
        
        $this->_id        = $id        ;
        $this->_dataDir   = $dataDir   ;
        $this->_resultObj = $resultObj ;
    }
    
    public function start ($id)
    {
        if ( ! is_null ($this->_currentId) )
        {
            $this->end ();
        }
        
        $this->_currentId   = (string) $id;
        $this->_currentTime = $this->_getCurrentTime ();
    }
    
    public function end ()
    {
        if ( is_null ($this->_currentId) )
        {
            throw new \LogicException ();
        }
        
        $result = $this->_resultObj->getClone ();
        
        /* @var $result Benchmark\ResultInterface */
        
        $result->setId ($this->_currentId);
        $result->setResourcesUsage (
            ($this->_getCurrentTime () - $this->_currentTime)
        );
        
        $this->_results [] = $result;
        
        $this->_currentId   = null;
        $this->_currentTime = null;
    }
    
    public function pushHandler (Handler\HandlerInterface $handler)
    {
        $this->_handlerStack->push ($handler);
    }
    
    public function report ()
    {
        
    }
    
    private function _getCurrentTime ()
    {
        // $get_as_float = true
        return microtime (true);
    }
}