<?php
namespace Howtomakeaturn\AskGmail;

class GoogleClientManager
{
    protected $client;
    
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function setConfig($config)
    {
        $this->client->setClientId($config['clientId']);        
        $this->client->setClientSecret($config['clientSecret']);
        $this->client->setRedirectUri($config['redirectUri']);
        $this->client->setScopes($config['scopes']);            
        $this->client->setAccessType('offline');
        $this->client->setApprovalPrompt('force');        
    }    
    
    public function getGoogleClient()
    {
        return $this->client;
    }
    
    public function setAccessToken($token)
    {
        $this->client->setAccessToken($token);            
    }
}
