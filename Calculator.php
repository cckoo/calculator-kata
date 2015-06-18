<?php

define("DELIMITER", ',');

class Calculator {
    public function add($stringNum) {
        if (strpos($stringNum, DELIMITER)) {
        }
        if ($stringNum) {
            return $stringNum;
        }
        return 0;
    }

        return explode(DELIMITER, $stringNum);
    }

        return $nums[0] + $nums[1];
    }
}