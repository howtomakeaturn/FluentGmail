<?php
namespace Howtomakeaturn\FluentGmail\Query;

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

    public function get($user, $labelId) {
        $label = $this->service->users_labels->get($user, $labelId);
        return $label;
    }
    
}
