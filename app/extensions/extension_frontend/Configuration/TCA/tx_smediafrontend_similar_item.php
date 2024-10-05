<?php
return [
    'ctrl' => [
        'label' => 'title',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'title' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.tx_smediafrontend_similar_item',
        'delete' => 'deleted',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'hideTable' => true,
        'hideAtCopy' => true,
        'prependAtCopy' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'languageField' => 'sys_language_uid',
        'translationSource' => 'l10n_source',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'typeicon_classes' => [
            'default' => 'similarSingleIcon',
        ]
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;headers,
                    title,
                    header,
                    subheader,
                    image,
                    description,
                    button_text,
                    button_link,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --palette--;;hiddenLanguagePalette,
            '
        ]
    ],
    'palettes' => [
        '1' => [
            'showitem' => ''
        ],
        'access' => [
            'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
            '
        ],
        'general' => [
            'showitem' => '
                tt_content,
            '
        ],
        'visibility' => [
            'showitem' => '
                hidden;LLL:EXT:smedia_frontend/Resources/Private/Language/Backend.xlf:tt_content.tx_smediafrontend_similar_item,
            '
        ],
        'hiddenLanguagePalette' => [
            'showitem' => 'sys_language_uid, l18n_parent',
            'isHiddenPalette' => true
        ]
    ],
    'columns' => [
        'tt_content' => [
            'exclude' => true,
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.tx_smediafrontend_similar_item',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.{#CType}=\'similar\'',
                'maxitems' => 1,
                'default' => 0
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true
                    ]
                ]
            ]
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'default' => 0,
                'eval' => 'datetime',
                'behaviour' => [
                    'allowLanguageSynchronization' => 1
                ]
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'default' => 0,
                'eval' => 'datetime',
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2040)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => 1
                ]
            ]
        ],
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => ['type' => 'language']
        ],
        'l18n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0
                    ]
                ],
                'foreign_table' => 'tx_smediafrontend_similar_item',
                'foreign_table_where' =>
                    'AND {#tx_smediafrontend_similar_item}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_smediafrontend_similar_item}.{#sys_language_uid} IN (-10)',
                'default' => 0
            ]
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'l18n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'title' => [
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.title',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ]
        ],
        'header' => [
            'exclude' => true,
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.header',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ]
        ],
        'subheader' => [
            'exclude' => true,
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.subheader',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ]
        ],
        'image' => [
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.image',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types,webp'
            ]
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ]
        ],
        'button_text' => [
            'exclude' => true,
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.button_text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ]
        ],
        'button_link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:smedia_frontend/Resources/Private/Language/locallang_db.xlf:tt_content.button_link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                        ],
                    ],
                ],
                'softref' => 'typolink'
            ]
        ],
    ]
];