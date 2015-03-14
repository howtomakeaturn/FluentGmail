<?php
namespace Howtomakeaturn\AskGmail;

use \Google_Service_Gmail;
/*
 * TODO: move to Query folder
 */
class QueryManager
{
    public $draft;
    public $profile;
    public $message;
    public $history;
    
    public function __construct($draft, $profile, $message, $history)
    {
        $this->draft = $draft;
        $this->profile = $profile;
        $this->message = $message;
        $this->history = $history;
    }
    
    static public function build($client)
    {
        return new self(
            new Query\Draft(
                new Google_Service_Gmail($client)
            ),
            new Query\Profile(
                new Google_Service_Gmail($client)
            ),
            new Query\Message(
                new Google_Service_Gmail($client)
            ),
            new Query\History(
                new Google_Service_Gmail($client)
            )        
        );        
    }
    
}
