<?php
declare(strict_types=1);

namespace App\Entity;

use App\Contract\ArrayExportInterface;

final class Etudiant extends Personne implements ArrayExportInterface
{
    private Filiere $filiere;

    public function __construct(?int $id, string $nom, string $email, Filiere $filiere)
    {
        parent::__construct($id,$nom,$email);
        $this->filiere = $filiere;
    }

    public function getFiliere(): Filiere
    {
        return $this->filiere;
    }

    public function role(): string
    {
        return "Etudiant";
    }

    public function export(): array
    {
        return [
            'id'=>$this->id(),
            'nom'=>$this->getNom(),
            'email'=>$this->getEmail(),
            'role'=>$this->role(),
            'filiere'=>$this->filiere->getLibelle()
        ];
    }
}
