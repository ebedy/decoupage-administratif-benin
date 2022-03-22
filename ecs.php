<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    // A. standalone rule
    $services = $containerConfigurator->services();
    $services->set(ArraySyntaxFixer::class)
        ->call('configure', [['syntax' => 'short']]);
    $services->set(MethodArgumentSpaceFixer::class)
        ->call('configure', [['on_multiline' => 'ensure_fully_multiline']]);

    // B. full sets
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SKIP, [
        // skip paths with legacy code
        __DIR__ . '/ecs.php',
    ]);
    $parameters->set(Option::PATHS, [
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/tests'
    ]);
    $parameters->set(Option::INDENTATION, 'tab');
    $parameters->set(Option::LINE_ENDING, "\r\n");

    $containerConfigurator->import(SetList::PSR_12);
    $containerConfigurator->import(SetList::STRICT);
    $containerConfigurator->import(SetList::PHP_CS_FIXER);
    $containerConfigurator->import(SetList::PHP_CS_FIXER_RISKY);
    $containerConfigurator->import(SetList::SPACES);
    $containerConfigurator->import(SetList::ARRAY);
    $containerConfigurator->import(SetList::DOCBLOCK);
    $containerConfigurator->import(SetList::NAMESPACES);
    $containerConfigurator->import(SetList::CONTROL_STRUCTURES);
    $containerConfigurator->import(SetList::CLEAN_CODE);
    $containerConfigurator->import(SetList::SYMPLIFY);
    $containerConfigurator->import(SetList::COMMON);
};
