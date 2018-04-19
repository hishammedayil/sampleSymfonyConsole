<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 12:48 PM
 */

namespace phpreboot\calculator\operations;

use InvalidArgumentException;

/**
 * Class Vat
 * @package phpreboot\calculator\operations
 */
class Vat implements OperationInterface
{
    /**
     * @param array $inputs
     * @return float
     */
    public function execute(array $inputs): float
    {
        $this->validate($inputs);
        $amount = $inputs[0];
        $vatRate = $inputs[1];
        return $amount + ($amount * ($vatRate / 100));
    }

    /**
     * @param array $inputs
     * @return bool
     */
    private function validate(array $inputs): bool
    {
        if (2 !== count($inputs)) {
            throw new InvalidArgumentException('Invalid inputs. Vat expects exactly 2 numeric arguments');
        }
        $nonNumericInputs = array_filter($inputs, function ($val) {
            return !is_numeric($val);
        });
        if (0 < count($nonNumericInputs)) {
            throw new InvalidArgumentException('Invalid inputs. Vat expects both amount and rate to be numeric');
        }
        return true;
    }
}