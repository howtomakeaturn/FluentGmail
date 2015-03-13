<?php
namespace Howtomakeaturn\AskGmail;

class QueryManager
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
    }

    function listHistory($service, $userId, $startHistoryId) {
        $opt_param = array('startHistoryId' => $startHistoryId);
        $pageToken = NULL;
        $histories = array();

        do {
            try {
              if ($pageToken) {
                $opt_param['pageToken'] = $pageToken;
              }
              $historyResponse = $service->users_history->listUsersHistory($userId, $opt_param);
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

}
