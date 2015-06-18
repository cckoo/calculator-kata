<?php
class Calculator {
    public function add($stringNum) {
        if (strpos($stringNum, ',')) {
            $nums = explode(',', $stringNum);
            return $nums[0] + $nums[1];
        }
        if ($stringNum) {
            return $stringNum;
        }
        return 0;
    }
}