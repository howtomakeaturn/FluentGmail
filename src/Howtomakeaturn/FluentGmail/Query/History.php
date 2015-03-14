<?php
namespace Howtomakeaturn\FluentGmail\Query;

class History extends Query
{

    /*
     * TODO: how to get the fucking pageToken?
     */
    public function _list($userId, $startHistoryId) {
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
