<?php
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)-> configureContainer(
    (
        new \B13\Container\Tca\ContainerConfiguration(
            '2col-container', 
            '2 Column Container',
            'Insert an element dividing the content area into two columns',
            [
                [
                    ['name' => 'Left Column', 'colPos' => 201],
                    ['name' => 'Right Column', 'colPos' => 202]
                ]
            ]
        )
    ) 
);