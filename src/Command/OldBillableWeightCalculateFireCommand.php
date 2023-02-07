<?php

namespace App\Command;

use App\Services\OldVersion\Shipping\BillableWeightCalculatorService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:old-billable-weight-calculate-fire',
    description: 'Add a short description for your command',
)]
class OldBillableWeightCalculateFireCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       $package = [
        'weight' => 6,
        'dimensions' => [
            'width' => 9,
            'length' => 15,
            'heigth' => 7,
            ]
        ];

        $fedexDimDivisor = 139;

        $billableWeight = (new BillableWeightCalculatorService())->caclulate(
            $package['dimensions']['width'],
            $package['dimensions']['heigth'],
            $package['dimensions']['length'],
            $package['weight'],
            $fedexDimDivisor,
        );

        echo $billableWeight . ' lb' . PHP_EOL;

        return Command::SUCCESS;
    }
}
