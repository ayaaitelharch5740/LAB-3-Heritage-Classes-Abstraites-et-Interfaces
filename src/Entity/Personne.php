<?php
declare(strict_types=1);

namespace App\Entity;

use App\Contract\IdentifiableInterface;

abstract class Personne implements IdentifiableInterface
{
    protected ?int $id;
    protected string $nom;
    protected string $email;

    public function __construct(?int $id, string $nom, string $email)
    {
        $this->changeId($id);
        $this->setNom($nom);
        $this->setEmail($email);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function changeId(?int $id): void
    {
        if($id !== null && $id <= 0){
            throw new \InvalidArgumentException("Id invalide");
        }
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $nom = trim($nom);

        if($nom === ''){
            throw new \InvalidArgumentException("Nom obligatoire");
        }

        $this->nom = $nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException("Email invalide");
        }

        $this->email = $email;
    }

    abstract public function role(): string;

    public function label(): string
    {
        return "[".$this->role()."] ".$this->nom." (".$this->email.")";
    }
}
