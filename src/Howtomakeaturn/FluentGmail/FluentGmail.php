<?php
namespace Howtomakeaturn\FluentGmail;
/*
 * Google keep publishing poor libraries and documentations.
 * I keep make them better and fluent.
 */
use \Google_Service_Gmail;
/*
 * TODO: move to Query folder
 */
class FluentGmail
{
    public $draft;
    public $profile;
    public $message;
    public $history;
    public $label;
    
    public function __construct($draft, $profile, $message, $history, $label)
    {
        $this->draft = $draft;
        $this->profile = $profile;
        $this->message = $message;
        $this->history = $history;
        $this->label = $label;
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
            ),
            new Query\Label(
                new Google_Service_Gmail($client)
            )        
        );        
    }
    
}
