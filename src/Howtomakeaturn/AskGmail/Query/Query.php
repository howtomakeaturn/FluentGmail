<?php
namespace Howtomakeaturn\AskGmail\Query;

class Query
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
    }
    
}
