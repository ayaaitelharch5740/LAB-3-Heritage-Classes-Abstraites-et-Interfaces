<?php
declare(strict_types=1);

namespace App\Contract;

interface IdentifiableInterface
{
    public function id(): ?int;

    public function changeId(?int $id): void;
}
