<?php
namespace Howtomakeaturn\AskGmail\Query;

class Profile extends Query
{

    function get($userId) 
    {
        return $this->service->users->getProfile($userId);
    }
    
}
