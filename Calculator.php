<?php

class Calculator {

    private $count      = 0;
    private $delimiter  = "/,|\n/";
    private $selfDefine = "/\/\/(.)\n(.*)/";
    private $stringNum;
    private $negative = [];

    public function add($stringNum) {

        $this->_getDelimiterAndStringNum($stringNum);
        $nums = $this->_getNums();
        $this->_getCount($nums);

        return $this->count;
    }

    private function _getNums() {
        return preg_split($this->delimiter, $this->stringNum);
    }

    private function _getCount($nums) {
        foreach($nums as $value) {
            $this->_validateNumNotNegative($value);
            $this->count += $value;
        }
        $this->_throwExceptionWithNegativeNums();
    }

    private function _getDelimiterAndStringNum($stringNum) {
        if (preg_match($this->selfDefine, $stringNum, $matchs)) {
            $this->delimiter = "/$matchs[1]/";
            $this->stringNum       = $matchs[2];
        } else {
            $this->stringNum = $stringNum;
        }
    }

    private function _validateNumNotNegative($num) {
        if ($num < 0) {
            array_push($this->negative, $num);
        }
    }

    private function _throwExceptionWithNegativeNums() {
        if ($this->negative) {
            throw new NegativeNumNotAllowedException($this->negative);
        }
    }
}

class NegativeNumNotAllowedException extends Exception {
    public function __construct($nums) {
        $this->message = "Negative nums not allowed(" . implode(",", $nums) . ")";
    }
}