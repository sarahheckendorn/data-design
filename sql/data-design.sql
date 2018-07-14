ALTER DATABASE sheckendorn CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS songTab;
DROP TABLE IF EXISTS `tab`;
DROP TABLE IF EXISTS song;
-- song entity
CREATE TABLE song (
	songId BINARY(16) NOT NULL,
	songAuthor VARCHAR(100) NOT NULL,
	songDifficulty VARCHAR(13),
	songTitle VARCHAR(100) NOT NULL,
	songTuning CHAR(12) NOT NULL,
	PRIMARY KEY (songId)
);
-- tab entity
CREATE TABLE `tab` (
	tabId BINARY (16) NOT NULL,
	tabImageUrl VARCHAR(255) NOT NULL,
	PRIMARY KEY (tabId)
);
-- songTab entity
CREATE TABLE songTab (
	songTabSongId BINARY(16) NOT NULL,
	songTabTabId BINARY(16) NOT NULL,
	-- indexing foreign keys
	INDEX(songTabSongId),
	INDEX(songTabTabId),
	-- foreign key relations
	FOREIGN KEY (songTabSongId) REFERENCES song(songId),
	FOREIGN KEY (songTabTabId) REFERENCES `tab`(tabId),
	-- composite foreign key
	PRIMARY KEY (songTabSongId, songTabTabId)
);