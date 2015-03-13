<?php
namespace Howtomakeaturn\AskGmail;

use \Google_Client;

class GoogleClientBuilder
{
    
    static public function build($config = [], $token = '')
    {
        $client = new Google_Client();

        $client->setClientId($config['clientId']);        
        $client->setClientSecret($config['clientSecret']);
        $client->setRedirectUri($config['redirectUri']);
        $client->setScopes($config['scopes']);            
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');        
        
        if ( $token ) $client->setAccessToken($token);        

        return $client;
    }
    
}
