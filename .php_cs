<?php
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP73Migration' => true,
        'array_syntax' => ['syntax' => 'short']
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
;
