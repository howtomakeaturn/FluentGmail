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
    
    public function setConfig($config)
    {
        $this->config = $config;
        
        $this->client->setClientId($config['clientId']);        
        $this->client->setClientSecret($config['clientSecret']);
        $this->client->setRedirectUri($config['redirectUri']);
        $this->client->setScopes($config['scopes']);            
        $this->client->setAccessType('offline');
        $this->client->setApprovalPrompt('force');        
    }

    public function createAuthUrl(){
        return $this->client->createAuthUrl();
    }

    protected function accessToken(){
        if ( !$this->config ){
            throw new BaseException('Config not set.');
        }
        return $this->client->authenticate($_GET['code']);        
    }
    
    public function processAndSaveToken($file)
    {
        $accessToken = $this->accessToken();
        
        file_put_contents($file, $accessToken);        
    }
    
    public function token($file)
    {
        return file_get_contents($file);        
    }
    
}
