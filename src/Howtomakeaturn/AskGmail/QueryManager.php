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
    function listHistory($userId, $startHistoryId) {
        $opt_param = array('startHistoryId' => $startHistoryId);
        $pageToken = NULL;
        $histories = array();

        do {
            try {
              if ($pageToken) {
                $opt_param['pageToken'] = $pageToken;
              }
              $historyResponse = $this->service->users_history->listUsersHistory($userId, $opt_param);
              if ($historyResponse->getHistory()) {
                $histories = array_merge($histories, $historyResponse->getHistory());
                $pageToken = $historyResponse->getNextPageToken();
              }
            } catch (Exception $e) {
              print 'An error occurred: ' . $e->getMessage();
            }
        } while ($pageToken);


        return $histories;
    }    

    function getProfile($userId) 
    {
        return $this->service->users->getProfile($userId);
    }


}
