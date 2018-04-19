<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 12:20 PM
 */

namespace phpreboot\calculator\operations;

use InvalidArgumentException;

/**
 * Class Addition
 * @package phpreboot\calculator\operations
 */
class Addition implements OperationInterface
{
    /**
     * @param array $inputs
     * @return float
     */
    public function execute(array $inputs): float
    {
        $this->validate($inputs);
        return array_sum($inputs);
    }

    /**
     * @param array $inputs
     * @return bool
     * @throws InvalidArgumentException
     */
    private function validate(array $inputs): bool
    {
        $nonNumericInputs = array_filter($inputs, function ($val) {
            return !is_numeric($val);
        });

        if (0 < count($nonNumericInputs)) {
            throw new InvalidArgumentException('Invalid inputs. Inputs contain non numeric values (' . implode(', ', $nonNumericInputs) . ')');
        }

        return true;
    }
}