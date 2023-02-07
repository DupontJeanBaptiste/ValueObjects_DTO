<?php

namespace App\Command;

use App\Services\Data\TransportSheetService;
use App\Services\ValueObjectVersion\Shipping\BillableWeightCalculatorService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:new-billable-weight-calculate-fire',
    description: 'Add a short description for your command',
)]
class NewBillableWeightCalculateFireCommand extends Command
{
    private $transportSheetService;

    public function __construct(TransportSheetService $transportSheetService)
    {
        $this->transportSheetService = $transportSheetService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // get the data given by the user
        $formData = [
            'transporter' => 'COLISPRIVE',
            'width' => 9,
            'height' => 7,
            'length' => 15,
            'weight' => 6,
        ];

        // get the stransporterSheet by the service related to

        $transportSheet = $this->transportSheetService->getTransportSheet($formData);

        // give the clean data to the calculator service

        $billableWeight = (new BillableWeightCalculatorService())->caclulate(
            $transportSheet,
        );

        echo $billableWeight . ' lb' . PHP_EOL;

        return Command::SUCCESS;
    }
}
