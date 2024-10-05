<?php
defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'News',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,teaser',
        'iconfile' => 'EXT:smedianews/Resources/Public/Icons/news.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'title, teaser, bodytext, media']
    ],
    'columns' => [
        'title' => [
            'exclude' => 0,
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'teaser' => [
            'exclude' => 0,
            'label' => 'Teaser',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15
            ]
        ],
        'bodytext' => [
            'exclude' => 0,
            'label' => 'Body Text',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'enableRichtext' => true
            ]
        ],
        'media' => [
            'label' => 'Media',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'media',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'Add Media'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette'
                        ],
                    ],
                    'minitems' => 0,
                    'maxitems' => 5,
                ],
                'jpg,jpeg,png,svg,gif'
            ),
        ],
    ]
];
