<?php

declare(strict_types=1);

use Ebedy\DecoupageAdministratifBenin\DecoupageAdministratif;

require_once __DIR__ . '/../vendor/autoload.php';

$commune = DecoupageAdministratif::getData()
	->type('commune')
    ->libelle('ALLADA')
	 ->code('01')
    ->get()
;

dump($commune);
