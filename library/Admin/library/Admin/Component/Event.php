<?php

class Admin_Component_Event extends Admin_Component_Abstract {

    public function prepare(CM_Frontend_Environment $environment, CM_Frontend_ViewResponse $viewResponse) {
        $event = $this->_params->getEvent('event');
        $venue = $event->getVenue();
        $allowEditing = $this->_params->getBoolean('allowEditing', true);

        $songListSuggested = new Denkmal_Paging_Song_Suggestion($event);
        $songListSuggested->setPage(1, 3);

        $linkListSuggested = new Denkmal_Paging_Link_Suggestion($event);

        $viewResponse->set('event', $event);
        $viewResponse->set('venue', $venue);
        $viewResponse->set('songListSuggested', $songListSuggested);
        $viewResponse->set('linkListSuggested', $linkListSuggested);
        $viewResponse->set('eventDuplicates', $event->getDuplicates());
        $viewResponse->set('allowEditing', $allowEditing);
    }
}
