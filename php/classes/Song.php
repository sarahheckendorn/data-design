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
	 * @throws \RangeException if $newSongId is n
	 * @throws \TypeError if $newSongId is not a uuid.e
	 */
	public function $setSongId( $newSongId) : void {
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
	public function($getSongAuthor) :string {
		return ($this->songAuthor);
	}
	/**
	 * mutator method for song author
	 *
	 * @param string $snewSongAuthor new value of song author
	 * @throws \InvalidArgumentException if $newSongAuthor is not a string or insecure
	 * @throws \RangeException if $newSongAuthor is > 100 characters
	 * @throws \TypeError if $newSongAuthor is not a string
	 **/
	public function setSongAuthor(string $newSongAuthor) : void {
	//verify that song author is secure
	$newSongAuthor = trim($newSongAuthor);
	$newSongAuthor = filter_var($newSongAuthor, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newSongAuthor) === true){
		throw(new \InvalidArgumentException("song author is empty or insecure"));
		}
	//verify that song author will fit in the database
	if(strlen($newSongAuthor) > 100) {
		throw(new \RangeException("song author is too long"))
		}
	}
}