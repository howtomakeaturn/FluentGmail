<?php
namespace Howtomakeaturn\FluentGmail\Query;

class Profile extends Query
{

    function get($userId) 
    {
        return $this->service->users->getProfile($userId);
    }
    
}
