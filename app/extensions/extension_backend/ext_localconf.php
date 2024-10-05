<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SmediaNews',
        'News',
        [
            \SchommerMedia\SmediaNews\Controller\NewsController::class => 'list', 
        ],
        // Non-cacheable
        [
            \SchommerMedia\SmediaNews\Controller\NewsController::class => 'list, detail', 
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
     // Configure a new plugin type for the detail action
     \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SmediaNews',
        'NewsDetails',
        [
            \SchommerMedia\SmediaNews\Controller\NewsController::class => 'detail',
        ],
        [],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
})();

