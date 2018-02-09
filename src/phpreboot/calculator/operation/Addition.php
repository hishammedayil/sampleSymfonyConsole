<?php
/**
 * Created by PhpStorm.
 * User: kapil
 * Date: 09/02/18
 * Time: 21:39
 */

namespace phpreboot\calculator\operation;

use phpreboot\calculator\contracts\OperationContract;

class Addition implements OperationContract
{

    /**
     * @inheritdoc
     */
    public function execute(array $numberArray): float
    {
        $this->validate($numberArray);

        return array_sum($numberArray);
    }

    /**
     * Validate if input is valid.
     *
     * @param array $numberArray
     * @throws \phpreboot\calculator\exception\CalculatorException In case validation failed.
     */
    public function validate(array $numberArray)
    {
        foreach ($numberArray as $number) {
            if (!is_numeric($number)) {
                throw new CalculatorException("Array parameters must be numbers");
            }
        }
    }
}