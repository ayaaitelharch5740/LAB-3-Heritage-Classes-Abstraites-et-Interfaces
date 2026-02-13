<?php
declare(strict_types=1);

namespace App\Entity;

use App\Contract\ArrayExportInterface;

final class Enseignant extends Personne implements ArrayExportInterface
{
    private string $grade;

    public function __construct(?int $id,string $nom,string $email,string $grade)
    {
        parent::__construct($id,$nom,$email);
        $this->setGrade($grade);
    }

    public function setGrade(string $grade): void
    {
        $grade = trim($grade);

        if($grade === ''){
            throw new \InvalidArgumentException("Grade obligatoire");
        }

        $this->grade = $grade;
    }

    public function role(): string
    {
        return "Enseignant";
    }

    public function export(): array
    {
        return [
            'id'=>$this->id(),
            'nom'=>$this->getNom(),
            'email'=>$this->getEmail(),
            'role'=>$this->role(),
            'grade'=>$this->grade
        ];
    }
}
