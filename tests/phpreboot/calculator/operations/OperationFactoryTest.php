<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 2:47 PM
 */

use phpreboot\calculator\operations\OperationFactory;
use \PHPUnit\Framework\TestCase;
use phpreboot\calculator\operations\OperationInterface;
use phpreboot\calculator\operations\Addition;
use \phpreboot\calculator\operations\Vat;

/**
 * Class OperationFactoryTest
 */
class OperationFactoryTest extends TestCase
{
    /**
     * @dataProvider validOperationsProvider
     */
    public function testGetOperationWithValidOperationReturnsValidOperationObject($operationName, $operationClass)
    {
        $operation = OperationFactory::getOperation($operationName);
        $this->assertInstanceOf(OperationInterface::class, $operation);
        $this->assertInstanceOf($operationClass, $operation);
    }

    /**
     * @expectedException \phpreboot\calculator\operations\OperationNotFoundException
     * @expectedExceptionMessage Operation "non-existing-operation" not found
     */
    public function testGetOperationWithInvalidOperationThrowsException()
    {
        OperationFactory::getOperation('non-existing-operation');
    }

    /**
     * @return array
     */
    public function validOperationsProvider()
    {
        return [
            ['add', Addition::class],
            ['vat', Vat::class]
        ];
    }
}
