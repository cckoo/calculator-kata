<?php

define("DELIMITER", ',');

class Calculator {

    public $count = 0;

    public function add($stringNum) {
        if (strpos($stringNum, DELIMITER)) {
            $nums = $this->_getNums($stringNum);
            $this->_getCount($nums);
            return $this->count;
        }
        if ($stringNum) {
            return $stringNum;
        }
        return 0;
    }

    private function _getNums($stringNum) {
        return explode(DELIMITER, $stringNum);
    }

    private function _getCount($nums) {
        foreach($nums as $value) {
            $this->count += $value;
        }
    }
}