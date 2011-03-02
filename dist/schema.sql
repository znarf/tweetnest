
CREATE TABLE IF NOT EXISTS `tn_tweets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL,
  `tweetid` varchar(100) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL,
  `text` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `favorite` tinyint(4) NOT NULL DEFAULT '0',
  `extra` text NOT NULL,
  `coordinates` text NOT NULL,
  `geo` text NOT NULL,
  `place` text NOT NULL,
  `contributors` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tn_tweetusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL,
  `screenname` varchar(25) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `extra` text NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tn_tweetwords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweetid` int(10) unsigned NOT NULL,
  `wordid` int(10) unsigned NOT NULL,
  `frequency` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tweetwords_tweetid` (`tweetid`),
  KEY `tweetwords_wordid` (`wordid`),
  KEY `tweetwords_frequency` (`frequency`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tn_words` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(150) NOT NULL,
  `tweets` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `words_tweets` (`tweets`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
