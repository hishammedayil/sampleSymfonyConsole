<?php
/**
 * Created by PhpStorm.
 * User: kapil
 * Date: 09/02/18
 * Time: 19:20
 */

namespace phpreboot\calculator;

use phpreboot\calculator\operations\OperationFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Exception;

/**
 * Class CalculatorCommand
 * @package phpreboot\calculator
 */
class CalculatorCommand extends Command
{
    protected function configure(): void
    {
        $this->setName("calculate")
            ->setDescription("Run the calculator operation")
            ->addArgument('operation', InputArgument::REQUIRED, 'Operation to be performed')
            ->addArgument('input', InputArgument::REQUIRED, 'Comma separated list of numbers');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        try {
            $operationName = $input->getArgument('operation');
            $inputArray = explode(',', $input->getArgument('input'));

            $operation = OperationFactory::getOperation($operationName);
            $result = $operation->execute($inputArray);
            $output->writeln([
                '<fg=green>',
                $result,
                '</>'
            ]);
        } catch(Exception $e) {
            $output->writeln([
                '<fg=red>',
                $e->getMessage(),
                '</>'
            ]);
        }

    }
}