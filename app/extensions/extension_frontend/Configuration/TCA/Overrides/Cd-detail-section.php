<?php
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
        new \B13\Container\Tca\ContainerConfiguration(
            'cd-detail-section', 
            'CD Detail Section',
            'Insert a detail section for Corporate Design Elements',
            [
                [
                    ['name' => 'Main Column', 'colPos' => 201],
                    ['name' => 'Sidebar Content', 'colPos' => 202]
            ]
            ]
        )
    )
    ->setIcon('EXT:smedia_frontend/Resources/Public/Icons/CD-Detail-Section.svg')
    ->setBackendTemplate('EXT:smedia_frontend/Resources/Private/Container/Templates/Cd-detail-section.html')
);

$GLOBALS['TCA']['tt_content']['types']['cd-detail-section']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,               
        bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
        --palette--;;language,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
        --palette--;;hidden,
        --palette--;;access,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
        categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        rowDescription,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';

$GLOBALS['TCA']['tt_content']['types']['cd-detail-section']['columnsOverrides']['bodytext']['config'] = [
    'rows' => 5,
    'enableRichtext' => true,
];