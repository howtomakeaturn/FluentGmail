<?php
namespace Howtomakeaturn\AskGmail\Query;

class Draft
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
    }

    public function get($user, $draftId) {
        $draft = $this->service->users_drafts->get($user, $draftId);
        return $draft;
    }

    public function _list($userId) {
        $drafts = array();

        $draftsResponse = $this->service->users_drafts->listUsersDrafts($userId);
        if ($draftsResponse->getDrafts()) {
            $drafts = array_merge($drafts, $draftsResponse->getDrafts());
        }

        return $drafts;
    }
    
}
