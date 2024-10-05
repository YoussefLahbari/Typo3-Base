CREATE TABLE tt_content (
    title varchar(255) DEFAULT '' NOT NULL,
    action_text VARCHAR(255) DEFAULT '' NOT NULL,
    action_link VARCHAR(255) DEFAULT '' NOT NULL,
    tx_smediafrontend_inline_item int(11) unsigned DEFAULT '0',
    tx_smediafrontend_slider_item int(11) unsigned DEFAULT '0',
    tx_smediafrontend_brand_item int(11) unsigned DEFAULT '0',
    tx_smediafrontend_service_item int(11) unsigned DEFAULT '0',
    tx_smediafrontend_model_item int(11) unsigned DEFAULT '0',
    tx_smediafrontend_downloads_item int(11) unsigned DEFAULT '0',
    tx_smediafrontend_similar_item int(11) unsigned DEFAULT '0',
);

CREATE TABLE tx_smediafrontend_inline_item (
    title varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0',
    tt_content int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smediafrontend_slider_item (
    title varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0',
    header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
    button_text varchar(255) DEFAULT '' NOT NULL,
    button_link varchar(255) DEFAULT '' NOT NULL,
    tt_content int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smediafrontend_brand_item (
    title varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0',
    header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
    button_text varchar(255) DEFAULT '' NOT NULL,
    button_link varchar(255) DEFAULT '' NOT NULL,
    tt_content int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smediafrontend_service_item (
    title varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0',
    header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
    button_text varchar(255) DEFAULT '' NOT NULL,
    button_link varchar(255) DEFAULT '' NOT NULL,
    tt_content int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smediafrontend_model_item (
    title varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0',
    header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
    button_text varchar(255) DEFAULT '' NOT NULL,
    button_link varchar(255) DEFAULT '' NOT NULL,
    tt_content int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smediafrontend_downloads_item (
    title varchar(255) DEFAULT '' NOT NULL,
    files int(11) unsigned DEFAULT '0',
    category varchar(255) DEFAULT '' NOT NULL,
    tt_content int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smediafrontend_similar_item (
    title varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0',
    description text DEFAULT '' NOT NULL,
    header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
    button_text varchar(255) DEFAULT '' NOT NULL,
    button_link varchar(255) DEFAULT '' NOT NULL,
    tt_content int(11) unsigned DEFAULT '0',
);