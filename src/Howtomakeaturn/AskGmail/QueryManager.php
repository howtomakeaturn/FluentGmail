<?php
namespace Howtomakeaturn\AskGmail;

class QueryManager
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
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

    function getProfile($userId) 
    {
        return $this->service->users->getProfile($userId);
    }

    public function listDrafts($userId) {
        $drafts = array();

        $draftsResponse = $this->service->users_drafts->listUsersDrafts($userId);
        if ($draftsResponse->getDrafts()) {
            $drafts = array_merge($drafts, $draftsResponse->getDrafts());
        }

        return $drafts;
    }
}
