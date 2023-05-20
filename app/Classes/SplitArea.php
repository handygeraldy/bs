<?php

namespace App\Classes;

class SplitArea
{

  

    public $kdprov, $kdkab, $kdkec, $kddesa, $nbs, $nsbs;

    public function __construct($bs, $smallest_area = 'bs')
    {
        $this->kdprov = substr($bs,0,2);
        $this->kdkab = substr($bs,2,2);
        $this->kdkec = substr($bs,4,3);
        $this->kddesa = substr($bs,7,3);
        $this->nbs = substr($bs,10,4);
        if ($smallest_area == 'nsbs'){
            $this->nsbs = substr($bs,14,2);
        }
    }

    public function getJson() {
        return json_encode($this);
    }  
}
