# Découpage administratif du BENIN

Wrapper PHP pour l'accès aux données concernant le découpage administratif français

## Installation

```
composer require ebedy/decoupage-administratif-benin
```

## Utilisation

### Liste par type de localite (departement, commune, arrondissement et quartier)
```php
<?php

include_once('../vendor/autoload.php');

use Ebedy\DecoupageAdministratifBenin\DecoupageAdministratif;

DecoupageAdministratif::Departement();
DecoupageAdministratif::Commune();
DecoupageAdministratif::Arrondissement();
DecoupageAdministratif::Quartier();
```
### Recherche
```php
<?php

include_once('../vendor/autoload.php');

use Ebedy\DecoupageAdministratifBenin\DecoupageAdministratif;

DecoupageAdministratif::find(string $code);
DecoupageAdministratif::find(string $code)->withChild();
DecoupageAdministratif::findOneBy(array $criteria);
DecoupageAdministratif::findBy(array $criteria);

```

## Crédits

- [@ebedy](https://github.com/ebedy)

## Licence
Données : Licence Ouverte
Code : MIT
