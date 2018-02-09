<?php
/**
 * Created by PhpStorm.
 * User: kapil
 * Date: 09/02/18
 * Time: 21:30
 */

namespace phpreboot\calculator;
use phpreboot\calculator\contracts\OperationContract;
use phpreboot\calculator\exception\CalculatorException;
use phpreboot\calculator\operation\Addition;

/**
 * Class CalculatorFactory, implementing Factory pattern.
 *
 * @package phpreboot
 */
class CalculatorFactory
{
    /**
     * @param string $operation
     * @return OperationContract
     * @throws CalculatorException
     */
    public static function getOperation(string $operation)
    {
        $operationClass = null;

        switch ($operation) {
            case "+":
            case "sum":
            case "add":
            case "addition":
                $operationClass = new Addition();
                break;
            default:
                throw new CalculatorException("Unsupported operation.");
        }

        return $operationClass;
    }
}