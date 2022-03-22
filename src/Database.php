<?php
declare(strict_types=1);

namespace Ebedy\DecoupageAdministratifBenin;

use Ebedy\DecoupageAdministratifBenin\Entity\Localite;
use Symfony\Component\Finder\Finder;

class Database
{
    private function fileToArray(): array
    {
        $data = '';
        $finder = new Finder();
        $finder->files()
            ->in(\dirname(__DIR__))
            ->name('data.json')
        ;
        foreach ($finder as $file) {
            $data .= $file->getContents();
        }

        return json_decode($data, false, 512, JSON_THROW_ON_ERROR);
    }

    private function dataTransformer(object $data): Localite
    {
        return new Localite($data);
    }

    private function getData(): \Generator
    {
        $instance = $this->getLocalite();
        $array = $instance->fileToArray();

        foreach ($array as $value) {
            yield $instance->dataTransformer($value);
        }
    }
}
