<?php
namespace Howtomakeaturn\AskGmail;

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

    protected function accessToken(){
        return $this->client->authenticate($_GET['code']);        
    }
    
    public function processAndSaveToken($file)
    {
        $accessToken = $this->accessToken();
        
        file_put_contents($file, $accessToken);        
    }
        
}
