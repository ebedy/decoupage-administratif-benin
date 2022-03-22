<?php
declare(strict_types=1);

namespace Ebedy\DecoupageAdministratifBenin;

use Ebedy\DecoupageAdministratifBenin\Entity\Localite;

class Query
{
    public function criteria(string $key, string $value): callable
    {
        return static fn ($item): bool => $item->$key === $value;
    }

    /**
     * @return array<array-key , Localite>
     */
    public function getAll(): array
    {
        return [];
    }

    /**
     * @return Localite|null
     */
    public function getOne(): ?Localite
    {
        return null;
    }
    public function withChildren(): self
    {
        return $this;
    }

    public function withParent(): self
    {
        return $this;
    }
}
