<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 3:32 PM
 */

use phpreboot\calculator\operations\Vat;
use PHPUnit\Framework\TestCase;

/**
 * Class VatTest
 */
class VatTest extends TestCase
{
    /**
     * @var Vat
     */
    private $vat;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->vat = new Vat();
    }

    public function testExecuteWithValidParametersReturnsResult()
    {
        $result = $this->vat->execute([100, 12.5]);
        $this->assertSame(112.5, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid inputs. Vat expects exactly 2 numeric arguments
     * @dataProvider invalidNumberOfParametersProvider
     */
    public function testExecuteWithMoreOrLessThanTwoParametersThrowsException()
    {
        $this->vat->execute([100, 12.5, 111]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid inputs. Vat expects both amount and rate to be numeric
     */
    public function testExecuteWithNonNumericInputsThroesException()
    {
        $this->vat->execute([200, 'a12']);
    }

    /**
     * @return array
     */
    public function invalidNumberOfParametersProvider()
    {
        return [
            [100, 12.5, 111],
            [100]
        ];
    }

}
