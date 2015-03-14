<?php
namespace Howtomakeaturn\AskGmail\Query;

class Profile
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
    }

    function get($userId) 
    {
        return $this->service->users->getProfile($userId);
    }
    
}
