<?php
namespace Howtomakeaturn\FluentGmail\Query;

class Message extends Query
{
    
    function _list($userId) {
        $pageToken = NULL;
        $messages = array();
        $opt_param = array();

        do {
            if ($pageToken) {
                $opt_param['pageToken'] = $pageToken;
            }
            $messagesResponse = $this->service->users_messages->listUsersMessages($userId, $opt_param);
            if ($messagesResponse->getMessages()) {
                $messages = array_merge($messages, $messagesResponse->getMessages());
                $pageToken = $messagesResponse->getNextPageToken();
            }
        } while ($pageToken);

        return $messages;

    }

    function get($userId, $messageId) {
        $message = $this->service->users_messages->get($userId, $messageId);
        return $message;
    }    
    
}
