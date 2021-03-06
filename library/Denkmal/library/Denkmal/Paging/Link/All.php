<?php

class Denkmal_Paging_Link_All extends Denkmal_Paging_Link_Abstract {

    /**
     * @param string|null $select
     */
    public function __construct($select = null) {
        if (null === $select) {
            $select = 'id';
        }
        $source = new CM_PagingSource_Sql($select, 'denkmal_model_link', '`failedCount` < 3', 'label asc');
        $source->enableCache();
        parent::__construct($source);
    }
}
