<?php
/**
 * Created by PhpStorm.
 * User: kapil
 * Date: 09/02/18
 * Time: 19:20
 */

namespace phpreboot\calculator;

use phpreboot\calculator\exception\CalculatorException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatorCommand extends Command
{
    protected function configure()
    {
        $this->setName("calculate")
            ->setDescription("Run the calculator operation")
            ->addArgument('operation', InputArgument::REQUIRED, 'Operation to be performed')
            ->addArgument('input', InputArgument::REQUIRED, 'Comma separated list of numbers');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '<fg=red>',
            'This is error',
            '</>'
        ]);


        try {
            $operation = CalculatorFactory::getOperation($input->getArgument('operation'));

            $inputArray = explode(',', $input->getArgument('input'));

            foreach ($inputArray as $number) {
                if (!is_numeric($number)) {
                    throw new CalculatorException("Input numbers must be comma separated numbers, non-numeric value given given: " . $number);
                }
            }

            $result = $operation->execute($inputArray);

            $output->writeln([
                '<fg=green>',
                'Result: ',
                $result,
                '</>'
            ]);
        } catch (CalculatorException $e) {
            $output->writeln([
                '<fg=red>',
                'Error: ',
                $e->getMessage(),
                '</>'
            ]);
        }

    }
}