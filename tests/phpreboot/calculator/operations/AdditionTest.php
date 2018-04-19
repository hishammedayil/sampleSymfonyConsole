<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 3:17 PM
 */

use phpreboot\calculator\operations\Addition;
use PHPUnit\Framework\TestCase;

/**
 * Class AdditionTest
 */
class AdditionTest extends TestCase
{
    /**
     * @var Addition
     */
    private $addition;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->addition = new Addition();
    }

    public function testExecuteWithValidParametersReturnsResult()
    {
        $result = $this->addition->execute([1, 2]);
        $this->assertSame(3.0, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid inputs. Inputs contain non numeric values (a1, b3)
     */
    public function testExecuteWithInvalidParametersThrowsException()
    {
        $this->addition->execute(['a1', 'b3']);
    }
}
