<?php

define("DELIMITER", ',');

class Calculator {
    public function add($stringNum) {
        if (strpos($stringNum, DELIMITER)) {
            $nums = $this->_getNums($stringNum);
            return $this->_getCount($nums);
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
        return $nums[0] + $nums[1];
    }
}