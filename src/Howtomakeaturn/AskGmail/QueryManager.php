<?php
namespace Howtomakeaturn\AskGmail;

class QueryManager
{
    public $draft;
    public $profile;
    public $message;
    
    public function __construct($draft, $profile, $message)
    {
        $this->draft = $draft;
        $this->profile = $profile;
        $this->message = $message;
    }

    /*
     * TODO: how to get the fucking pageToken?
     */
    public function listHistory($userId, $startHistoryId) {
        $opt_param = array('startHistoryId' => $startHistoryId);
        $pageToken = NULL;
        $histories = array();

        do {
            if ($pageToken) {
                $opt_param['pageToken'] = $pageToken;
            }
            $historyResponse = $this->service->users_history->listUsersHistory($userId, $opt_param);
            if ($historyResponse->getHistory()) {
                $histories = array_merge($histories, $historyResponse->getHistory());
                $pageToken = $historyResponse->getNextPageToken();
            }
        } while ($pageToken);

        return $histories;
    }
    
}
