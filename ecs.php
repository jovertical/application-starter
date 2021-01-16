<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->parameters()
        ->set(Option::PATHS, [__DIR__ . '/app', __DIR__ . '/database'])
        ->set(Option::SETS, [SetList::CLEAN_CODE, SetList::PSR_12]);
};
