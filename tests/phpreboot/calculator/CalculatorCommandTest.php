<?php
/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 18/4/18
 * Time: 2:43 PM
 */

use phpreboot\calculator\CalculatorCommand;
use \PHPUnit\Framework\TestCase;
use \Symfony\Component\Console\Application;
use \Symfony\Component\Console\Tester\CommandTester;

/**
 * Class CalculatorCommandTest
 */
class CalculatorCommandTest extends TestCase
{
    /**
     * @var CommandTester
     */
    private $commandTester;

    protected function setUp()
    {
        $application = new Application();
        $application->add(new CalculatorCommand());
        $command = $application->find('calculate');
        $this->commandTester = new CommandTester($command);
    }

    protected function tearDown()
    {
        $this->commandTester = null;
    }

    public function testExecuteWithValidParametersReturnsResult()
    {
        $this->commandTester->execute(['operation' => 'add', 'input' => '4,5']);
        $output = $this->commandTester->getDisplay();
        $this->assertNotContains('Invalid', $output);
        $this->assertEquals('9', intval($output));
    }

    /**
     * @param array $argument
     * @dataProvider invalidParametersProvider
     */
    public function testExecuteWithInvalidParametersReturnsError(array $argument)
    {
        $this->commandTester->execute($argument);
        $output = $this->commandTester->getDisplay();
        $this->assertContains('Invalid', $output);
    }

    /**
     * @return array
     */
    public function invalidParametersProvider()
    {
        return [
            [['operation' => 'non-existing-operation', 'input' => '4,5']],
            [['operation' => 'vat', 'input' => 'non-numeric-input4,5']],
            [['operation' => 'add', 'input' => 'non-numeric-input4,a5']]
        ];
    }
}
