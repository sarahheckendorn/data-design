<?php

class Song {
	/**
	 * id for this song; this is the primary key
	 * @var $songId
	 */
	private $songId;
	/**
	 * author that wrong the song
	 * @var $songAuthor
	 */
	private $songAuthor;
	/**
	 * level of difficulty for the song
	 * @var  $songDifficulty
	 */
	private $songDifficulty;
	/**
	 * the key the song is played in
	 * @var $songKey
	 */
	private $songKey;
	/**
	 * the song title
	 * @var $songTitle
	 */
	private $songTitle;
	/**
	 * how the song needs to be tuned
	 * @var $songTuning
	 */
	private $songTuning;

	/**
	 * accessor method for songId
	 *
	 * @return Uuid value of song id
	 */
	public function getSongId() : Uuid {
		return($this->songId);
	}

	/**
	 * mutator method for songId
	 *
	 * @param Uuid/string $newSongId new value of songId
	 * @throws \RangeException if $newSongId is not alphanumeric
	 * @throws \TypeError if $newSongId is not a uuid
	 */
	public function setSongId($newSongId) : void {
		try {
			$uuid = self::validateUuid($newSongId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the song Id
		$this->songId = $uuid;
	}

	/**
	 * accessor method for songAuthor
	 *
	 * @return string value of song Author
	 */
	public function getSongAuthor() : string {
	return ($this->songAuthor);
}
	/**
	 * mutator method for song author
	 *
	 * @param string $newSongAuthor new value of song author
	 * @throws \InvalidArgumentException if $newSongAuthor is not a string or insecure
	 * @throws \RangeException if $newSongAuthor is > 100 characters
	 * @throws \TypeError if $newSongAuthor is not a string
	 **/
	public function setSongAuthor(string $newSongAuthor) : void {
	//verify that song author is secure
	$newSongAuthor = trim($newSongAuthor);
	$newSongAuthor = filter_var($newSongAuthor, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newSongAuthor) === true){
		throw(new \InvalidArgumentException("Song author cannot be empty"));
	}
	//verify that song author will fit in the database
	if(strlen($newSongAuthor) > 100) {
		throw(new \RangeException("song author exceeds character limit"));
		}
	// stores song author content
	$this->songAuthor = $newSongAuthor;
}

/**
 * accessor method for songDifficulty
 *
 * @return string value of song difficulty
 */
	public function getSongDifficulty() :string {
	return ($this->songDifficulty);
	}
	/**
	 * mutator method for song difficulty
	 *
	 * @param string $newSongDifficulty new value of song Difficulty
	 * @throws \InvalidArgumentException if $newSongDifficulty is not a string or insecure
	 * @throws \RangeException if $newSongDifficulty is > 13 characters
	 * @throws \TypeError if $newSongDifficulty is not a string
	 **/
	public function setSongDifficulty(string $newSongDifficulty) : void {
	//verify that song difficulty is secure
	$newSongDifficulty = trim($newSongDifficulty);
	$newSongDifficulty = filter_var($newSongDifficulty, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newSongDifficulty) === true){
		throw(new \InvalidArgumentException("song difficulty cannot be empty"));
	}
	//verify that song difficulty will fit in the database
	if(strlen($newSongDifficulty) > 13) {
		throw(new \RangeException("song difficulty exceeds character limit"));
		}
	// stores song difficulty content
	$this->songDifficulty = $newSongDifficulty;
}

/**
 * accessory method for songKey
 *
 * @return string value of song Key
 */
	public function getSongKey() :string {
	return ($this->songKey);
	}
	/**
	 * mutator method for song key
	 *
	 * @param string $newSongKey new value of song Key
	 * @throws \InvalidArgumentException if $newSongKey is not a string or insecure
	 * @throws \RangeException if $newSongKey is > 5
	 */
	public function setSongKey(string $newSongKey) : void {
	//verify that song difficulty is secure
	$newSongKey = trim($newSongKey);
	$newSongKey = filter_var($newSongKey, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newSongKey) === true){
		throw(new \InvalidArgumentException("song key cannot be empty"));
	}
	//verify that song key will fit in the database
	if(strlen($newSongKey) > 5) {
		throw(new \RangeException("song key characters exceed limit"));
		}
	//stores song key content
	$this->songKey = $newSongKey;
}

/**
 * accessory method for songTitle
 *
 * @return string value of song Title
 */
	public function getSongTitle() :string {
		return ($this->songTitle);
	}
	/**
	 * mutator method for song title
	 *
	 * @param string $newSongTitle new value of Song Title
	 * @throw \InvalidArgumentException if $newSongTitle is not a string or insecure
	 * @throws \RangeException if $newSongTitle is > 100
	 */
	public function setSongTitle(string $newSongTitle) : void {
		//verify that song title is secure
		$newSongTitle = trim($newSongTitle);
		$newSongTitle = filter_var($newSongTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newSongTitle) === true) {
			throw(new \InvalidArgumentException("Song title cannot be empty"));
		}
		//verify that song title will fit in the database
		if(strlen($newSongTitle) > 100) {
			throw(new \RangeException("song title characters exceed limit"));
		}
		//stores song title content
		$this->songTitle = $newSongTitle;
	}

/**
 * accesstory method for song Tuning
 *
 * @return string value of song tuning
 */
	public function getSongTuning() :string {
		return ($this->songTuning);
	}
	/**
	 * mutator method for song title
	 *
	 * @param string $newSongTuning new value of song tuning
	 * @throws \InvalidArgumentException if $newSongTuning is not a string or insecure
	 * @throws \RangeException if $newSongTuning is > 12
	 */
	public function setSongTuning(string $newSongTuning) : void {
		//verify that song tuning is secure
		$newSongTuning = trim($newSongTuning);
		$newSongTuning = filter_var($newSongTuning, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newSongTuning) === true) {
			throw(new \InvalidArgumentException("Song tuning cannot be empty"));
		}
		//verify that song tuning will fit in the database
		if(strlen($newSongTuning) > 12) {
			throw(new \RangeException("song tuning characters exceed limit"));
		}
		//stores song tuning content
		$this->songTuning = $newSongTuning;
	}
}