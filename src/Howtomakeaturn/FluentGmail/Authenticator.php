<?php
namespace Howtomakeaturn\FluentGmail;

class Authenticator
{
    protected $client;
    
    protected $config = [];
    
    public function __construct($client)
    {
        $this->client = $client;
    }
    
    public function createAuthUrl(){
        return $this->client->createAuthUrl();
    }

    public function accessToken(){
        return $this->client->authenticate($_GET['code']);        
    }
            
}
