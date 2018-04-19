<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 12:21 PM
 */

namespace phpreboot\calculator\operations;


/**
 * Interface OperationInterface
 * @package phpreboot\calculator\operations
 */
interface OperationInterface
{
    /**
     * @param array $inputs
     * @return float
     */
    public function execute(array $inputs): float;
}