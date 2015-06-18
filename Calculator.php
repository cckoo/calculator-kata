<?php

define("DELIMITER", "/,|\n/");

class Calculator {

    private $count = 0;

    public function add($stringNum) {
        if (preg_match(DELIMITER, $stringNum)) {
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
        return preg_split(DELIMITER, $stringNum);
    }

    private function _getCount($nums) {
        foreach($nums as $value) {
            $this->count += $value;
        }
    }
}