<?php

defined('TYPO3') or die('Access denied.');

// Temporary variables
$extensionKey = 'smedia_frontend';
$elementKey = 'inline';
$icon = 'smediafrontend-inline';

// Add Content Element
if (!is_array($GLOBALS['TCA']['tt_content']['types'][$elementKey] ?? false)) {
    $GLOBALS['TCA']['tt_content']['types'][$elementKey] = [];
}

// Allow table on standard page replacement
$GLOBALS['TCA']['tx_smediafrontend_inline_item']['ctrl']['security']['ignorePageTypeRestriction'] = true;

// Add content element to selector list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_be.xlf:content_element.inline',
        'value' => $elementKey,
        'icon' => $icon,
        'group' => $extensionKey,
    ]
);

// Assign Icon
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$elementKey] = $icon;

// Configure element type
$GLOBALS['TCA']['tt_content']['types'][$elementKey] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types'][$elementKey],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;headers,
                tx_smediafrontend_inline_item,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            --div--;Container,
                --palette--;Container settings;container-settings,
        '
    ]
);

// Register fields
$GLOBALS['TCA']['tt_content']['columns'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['columns'],
    [
        'tx_smediafrontend_inline_item' => [
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/Backend.xlf:tt_content.tx_smediafrontend_inline_item',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_smediafrontend_inline_item',
                'foreign_field' => 'tt_content',
                'appearance' => [
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'expandSingle' => true,
                    'enabledControls' => [
                        'localize' => true,
                    ]
                ],
                'behaviour' => [
                    'mode' => 'select'
                ]
            ]
        ]
    ]
);
