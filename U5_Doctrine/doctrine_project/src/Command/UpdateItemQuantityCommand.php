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
    name: 'app:update-item-quantity',
    description: 'Update the quantity of an item',
)]
class UpdateItemQuantityCommand extends Command
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

        // 🔹 Mostrar items disponibles
        $items = $this->entityManager
            ->getRepository(Item::class)
            ->findAll();

        if (!$items) {
            $io->error('No hay items en la base de datos');
            return Command::FAILURE;
        }

        foreach ($items as $item) {
            $io->writeln(sprintf(
                'ID: %d | %s | Cantidad actual: %d',
                $item->getId(),
                $item->getName(),
                $item->getQuantity()
            ));
        }

        // 🔹 Preguntar qué item modificar
        $itemId = $io->ask('Introduce el ID del item a modificar');

        $item = $this->entityManager
            ->getRepository(Item::class)
            ->find($itemId);

        if (!$item) {
            $io->error('Item no encontrado');
            return Command::FAILURE;
        }

        // 🔹 Nueva cantidad
        $newQuantity = $io->ask('Nueva cantidad', $item->getQuantity());

        $item->setQuantity((int)$newQuantity);

        // 🔹 Guardar cambios
        $this->entityManager->flush();

        $io->success('Cantidad actualizada correctamente');

        return Command::SUCCESS;
    }
}
