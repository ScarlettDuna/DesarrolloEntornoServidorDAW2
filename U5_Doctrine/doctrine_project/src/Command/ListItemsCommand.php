<?php

namespace App\Command;

use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:list-items',
    description: 'List all items with their supplier',
)]
class ListItemsCommand extends Command
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

        $items = $this->entityManager
            ->getRepository(Item::class)
            ->findAll();

        if (!$items) {
            $io->warning('No hay items en la base de datos');
            return Command::SUCCESS;
        }

        foreach ($items as $item) {
            $io->writeln(sprintf(
                'Item: %s | Precio: %.2f | Cantidad: %d | Supplier: %s',
                $item->getName(),
                $item->getPrice(),
                $item->getQuantity(),
                $item->getSupplier()->getName()
            ));
        }

        return Command::SUCCESS;
    }
}
