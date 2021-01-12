<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->in(__DIR__ . DIRECTORY_SEPARATOR . 'app')
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
    ])
    ->setFinder($finder);
