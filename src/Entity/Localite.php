<?php

declare(strict_types=1);

namespace Ebedy\DecoupageAdministratifBenin\Entity;

class Localite
{
	public string $code;

	public string $libelle;

	public string $type;

	public ?string $parent = null;

	public array $children = [];

	public function __construct(object $data)
	{
		if ($data->type !== null && $data->code !== null && $data->libelle !== null) {
			$this->type = $data->type;
			$this->code = $data->code;
			$this->libelle = $data->libelle;
		}
		if ($data->parent !== null) {
			$this->parent = $data->parent;
		}
		$this->children = [];
	}

	public function __toString(): string
	{
		return $this->code . ' - ' . $this->libelle;
	}
}
