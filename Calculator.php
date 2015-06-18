<?php

class Calculator {

    private $count      = 0;
    private $delimiter  = "/,|\n/";
    private $selfDefine = "/\/\/(.)\n(.*)/";


    public function add($stringNum) {

        if (preg_match($this->selfDefine, $stringNum, $matchs)) {
            $this->delimiter = "/$matchs[1]/";
            $stringNum       = $matchs[2];
        }
        $nums = $this->_getNums($stringNum);
        $this->_getCount($nums);

        return $this->count;
    }

    private function _getNums($stringNum) {
        return preg_split($this->delimiter, $stringNum);
    }

    private function _getCount($nums) {
        foreach($nums as $value) {
            $this->count += $value;
        }
    }
}