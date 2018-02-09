<?php
/**
 * Created by PhpStorm.
 * User: kapil
 * Date: 09/02/18
 * Time: 21:48
 */

namespace phpreboot\calculator\exception;


use Throwable;

class CalculatorException extends \Exception
{
    public function __construct($message = "Calculator Exception", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}