<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 12:19 PM
 */

namespace phpreboot\calculator\operations;


/**
 * Class OperationFactory
 * @package phpreboot\calculator\operations
 */
class OperationFactory
{
    /**
     * @param string $operationName
     * @return OperationInterface
     * @throws OperationNotFoundException
     */
    public static function getOperation(string $operationName): OperationInterface
    {
        switch ($operationName) {
            case 'add':
            case 'sum':
                return new Addition();
            case 'vat':
                return new Vat();
            default:
                throw new OperationNotFoundException('Invalid operation. Operation "' . $operationName . '" not found');
        }
    }
}