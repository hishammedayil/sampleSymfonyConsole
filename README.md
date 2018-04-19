> This is a fork of  [phpreboot/OOPsMeetupCode](https://github.com/phpreboot/OOPsMeetupCode)
## Running given project.

Purpose of this test is just to check your coding styles ability to implement a solution implementing coding best practices with two goals:

- Easy to Read
- Easy to Extend

A suggestion, we are providing base running project using symfony console. To run this project, run following commands:

```bash
composer install
php calculator calculate add 1,2
```

Here, add is the operation and 1,2 is input. Thus expected output is 3. However, remember, we need to support many more operations, not just add. It is expected, in future, a team of 7-8 developer will be working in parallel on different operations, thus their work should not conflict and any new operation must not impact existing functionality. Can you design such architecture?

You can check this running project in two files:

- ./calculator - It is just wrapper, using symfony command component. You need not to edit this file.
- ./src/phpreboot/calculator/CalculatorCommand.php

CalculatorCommand.php is the file where you need to do your magic. If you are not familiar with Symfony console component (You need not to know), basic code is given to demonstrate how to get input and print output. 

> If you are on windows, just rename `./calculator` to `./calculator.php` and run command `php calculator.php calculate add 1,2`.

# Problem Statement

We want to build a calculator that receives two numbers and does an operation.

We do not know which kind of operations we want to do yet, we will get them in the future (future business requirements) and this calculator may have really complex operations.

Current planned operations are:

- Sum
- VAT (amount, vat rate)

Different team will be adding parallel operations to this calculator so it must be easy to read (so that new developers can easily understand project) and easily extendable (So that multiple developers can work in parallel to add new operation and adding new operation must not break existing operations).
