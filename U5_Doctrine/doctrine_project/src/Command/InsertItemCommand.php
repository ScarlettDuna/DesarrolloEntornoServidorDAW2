<?php

namespace App\Command;


use App\Entity\Item;
use App\Entity\Supplier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:insert-item',
    description: 'Insert an item linked to a supplier',
)]
class InsertItemCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // 🔹 Obtener un supplier existente (por ejemplo, el primero)
        $supplier = $this->entityManager
            ->getRepository(Supplier::class)
            ->findOneBy([]);

        if (!$supplier) {
            $io->error('No hay suppliers en la base de datos');
            return Command::FAILURE;
        }

        // 🔹 Crear el item
        $item = new Item();
        $item->setName('Zapatillas Air');
        $item->setDescription('Zapatillas deportivas');
        $item->setPrice(120.50);
        $item->setQuantity(10);
        $item->setSupplier($supplier);

        // 🔹 Persistir
        $this->entityManager->persist($item);
        $this->entityManager->flush();

        $io->success('Item insertado con ID: ' . $item->getId());

        return Command::SUCCESS;
    }
}
