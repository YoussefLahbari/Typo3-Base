<?php

defined('TYPO3') or die;

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'SmediaNews',
        'News',
        'News',
        null,
        'news'
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'SmediaNews',
        'NewsDetails',
        'News Details',
        null,
        'news'
    );

    // $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['smedianews_news'] = 'pi_flexform';
    
    $flexFormSettings = ['news', 'newsDetails'];

    foreach($flexFormSettings as $item) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            '*',
            'FILE:EXT:smedia_news/Configuration/FlexForms/flexform_' . $item . '.xml',
            'smedianews_' . $item
        );
        


        $GLOBALS['TCA']['tt_content']['types']['smedianews_' . $item]['showitem'] = '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                --palette--;;headers,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin,
                pi_flexform,
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
    }
})();
