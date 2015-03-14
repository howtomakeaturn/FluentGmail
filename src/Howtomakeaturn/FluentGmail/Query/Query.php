<?php
namespace Howtomakeaturn\FluentGmail\Query;

class Query
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
    }
    
}
