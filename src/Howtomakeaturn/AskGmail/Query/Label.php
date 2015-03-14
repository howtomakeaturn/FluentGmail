<?php
namespace Howtomakeaturn\AskGmail\Query;

class Label extends Query
{
    
    function _list($userId) {
        $labels = array();

        $labelsResponse = $this->service->users_labels->listUsersLabels($userId);

        if ($labelsResponse->getLabels()) {
            $labels = array_merge($labels, $labelsResponse->getLabels());
        }

        return $labels;
    }

}
