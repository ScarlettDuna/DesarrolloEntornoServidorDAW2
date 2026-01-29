<?php

namespace App\Command;

use App\Entity\Supplier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:insert-supplier',
    description: 'Insert a supplier into the database',
)]
class InsertSupplierCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $supplier = new Supplier();
        $supplier->setName('Nike');
        $supplier->setAddress('Portland, USA');

        $this->entityManager->persist($supplier);
        $this->entityManager->flush();

        $io->success('Supplier insertado con ID: ' . $supplier->getId());

        return Command::SUCCESS;
    }
}
