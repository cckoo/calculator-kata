<?php
class Calculator {
    public function add($stringNum) {
        if ($stringNum) {
            return $stringNum;
        }
        return 0;
    }
}