<?php

declare(strict_types=1);

namespace Ebedy\DecoupageAdministratifBenin;

use Ebedy\DecoupageAdministratifBenin\Entity\Localite;
use loophp\collection\Collection;
use Symfony\Component\Finder\Finder;

final class DecoupageAdministratif
{
    private static $handler;
    private array $criteria = [];

    public static function getData():self{
        if (null === self::$handler) {
            self::$handler = new self();
        }
        return self::$handler;
    }
	public function libelle(string $libelle): self
	{
        $this->criteria['libelle'] = trim($libelle);
		return $this;
	}

	public function type(string $type): self
	{
        $this->criteria['type'] = trim($type);
		return $this;
	}

	public function code(string $code): self
	{
        $this->criteria['code'] = trim($code);
		return $this;
	}
    public function get():array{
        return $this->criteria;
    }
}
