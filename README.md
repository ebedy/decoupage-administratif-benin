# Découpage administratif du BENIN

Wrapper PHP pour l'accès aux données concernant le découpage administratif français

## Installation

```
composer require ebedy/decoupage-administratif-benin
```

## Utilisation

### Liste par type de localite (departements, communes, arrondissements et quartiers)
```php
<?php

declare(strict_types=1);

include_once('../vendor/autoload.php');

use Ebedy\DecoupageAdministratifBenin\DecoupageAdministratif;

/** @var array<array-key,Localite> $all */
$all = DecoupageAdministratif::getAll();
$departements = DecoupageAdministratif::getBy()->type('departement');

/** @var array<array-key,Localite> $communes */
$communes = DecoupageAdministratif::getBy()->type('commune');

/** @var array<array-key,Localite> $arrondissements */
$arrondissements = DecoupageAdministratif::getBy()->type('arrondissement');

/** @var array<array-key,Localite> $quartiers */
$quartiers = DecoupageAdministratif::getBy()->type('quartier');
```
### Recherche

## Crédits

- [@ebedy](https://github.com/ebedy/decoupage-administratif-benin)

## Licence
Données : Licence Ouverte
Code : MIT

