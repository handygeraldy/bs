<?php

namespace App\Classes;

class Param {

    public $surveyId;
    public $surveyFrameId;
    public $samplingId;
    // public $releaseId;
    // public $releaseIds;
    // public $sampleIds;
    public $filter;
    public $sort;
    public $year;
    public $select;
    public $groupBy;

    public function __construct($params = [])
    {
        foreach($params as $key => $param) {
            $this->$key = $param;
        }
    }

    public function getJson() {
        return json_encode($this);
    }
    
}

?>