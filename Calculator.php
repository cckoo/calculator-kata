<?php

class Calculator {

    private $count      = 0;
    private $delimiter  = "/,|\n/";
    private $selfDefine = "/\/\/(.)\n(.*)/";
    private $stringNum;

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
            if ($value < 0) {
                throw new NegativeNumNotAllowedException($value);

            }
            $this->count += $value;
        }
    }

    private function _getDelimiterAndStringNum($stringNum) {
        if (preg_match($this->selfDefine, $stringNum, $matchs)) {
            $this->delimiter = "/$matchs[1]/";
            $this->stringNum       = $matchs[2];
        } else {
            $this->stringNum = $stringNum;
        }
    }
}

class NegativeNumNotAllowedException extends Exception {
    public function __construct($nums) {
        $this->message = "Negative nums not allowed" . $nums;
    }
}