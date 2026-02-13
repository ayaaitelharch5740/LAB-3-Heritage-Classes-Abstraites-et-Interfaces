<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Personne;

final class DisplayService
{
    public function show(array $list): void
    {
        foreach($list as $item){

            if(!$item instanceof Personne){
                throw new \InvalidArgumentException("Objet invalide");
            }

            echo $item->label() . PHP_EOL;
        }
    }
}
