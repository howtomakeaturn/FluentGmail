<?php
namespace Howtomakeaturn\AskGmail;

class Manager
{

    public function token($file)
    {
        return file_get_contents($file);        
    }
    
}
