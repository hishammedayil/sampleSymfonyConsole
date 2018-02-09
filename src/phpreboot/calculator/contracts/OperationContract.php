<?php
/**
 * Created by PhpStorm.
 * User: kapil
 * Date: 09/02/18
 * Time: 21:37
 */

namespace phpreboot\calculator\contracts;

interface OperationContract
{
    /**
     * Execute an operation.
     *
     * @param array $numberArray Input for the operation.
     * @return float result of operation.
     * @throws \phpreboot\calculator\exception\CalculatorException In case of any error.
     */
    public function execute(array $numberArray): float;
}