<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Schommer Media Frontend',
    'description' => 'Schommer Media Frontend Extension delivers a full configured frontend theme for TYPO3.',
    'category' => 'frontend',
    'constraints' => [
        'depends' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'SchommerMedia\\SmediaFrontend\\' => 'Classes'
        ],
    ],
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Alexander',
    'author_email' => 'a.liebert@schommer-media.de',
    'author_company' => 'Schommer Media GmbH',
    'version' => 'v0.0.1',
];
