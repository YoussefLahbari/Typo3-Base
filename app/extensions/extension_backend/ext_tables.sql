CREATE TABLE tt_content (
    title varchar(255) DEFAULT '' NOT NULL,
    tx_smedianews_domain_model_news int(11) unsigned DEFAULT '0',
);
CREATE TABLE tx_smedianews_domain_model_news (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    teaser text,
    bodytext text,
    media int(11),
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(1) DEFAULT '0' NOT NULL,
    hidden tinyint(1) DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY tstamp (tstamp),
    tt_content int(11) unsigned DEFAULT '0',
);
