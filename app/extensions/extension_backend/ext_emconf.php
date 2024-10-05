<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Schommer Media News',
    'description' => 'Schommer Media News Extension delivers a full configured News extension for TYPO3.',
    'category' => 'news',
    'constraints' => [
        'depends' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'SchommerMedia\\SmediaNews\\' => 'Classes'
        ],
    ],
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Youssef',
    'author_email' => 'y.lahbari@schommer-media.de',
    'author_company' => 'Schommer Media GmbH',
    'version' => 'v0.0.1',
];
