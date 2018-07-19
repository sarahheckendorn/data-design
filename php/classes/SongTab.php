<?php

class SongTab {
	/**
	 * id for the SongTabSongId; this is a foreign key
	 * @var $songTabSongId
	 */
	private $songTabSongId;
	/**
	 * id for the SongTabTabId; this is a foreign key
	 * @var $songTabTabId
	 */
	private $songTabTabId;

	public function __construct(int $newSongTabSongId, int $newSongTabTabId) {
		try{
			$this->setSongTabSongId($newSongTabSongId);
			$this->setSongTabTabId($newSongTabTabId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * Accessor method for songTabSongId
	 *
	 * @return Uuid value of songTabSongId
	 */
	public function getSongTabSongId() : Uuid {
		return($this->songTabSongId);
	}
	/**
	 * mutator method for songTabSongId
	 *
	 * @param Uuid/string $newSongTabSongId new value of songTabSongId
	 * @throws \RangeException if $newSongTabSongId is not alphanumeric
	 * @throws \TypeError if $newSongTabSongId is not a uuid
	 */
	public function setSongTabSongId($newSongTabSongId) : void {
		try{
			$uuid = self::validateUuid ($newSongTabSongId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	//convert and store the songTab SongId
		$this->songTabSongId = $uuid;
	}

	/**
	 *Accessor method for songTabTabId
	 *
	 *@return Uuid value of songTabTabId
	 */
	public function getSongTabTabId() : Uuid {
		return($this->songTabTabId);
	}
	/**
	 * mutator method for songTabTabId
	 *
	 * @param Uuid/string $newSongTabTabId new value of songTabTabId
	 * @throws \RangeException if $newSongTabTabId is not alphanumeric
	 * @throws \TypeError if $newSongTabTabId is not a uuid
	 */
	public function setSongTabTabId($newSongTabTabId) : void {
		try{
			$uuid = self::validateUuid ($newSongTabTabId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and stores the songTab TabId
		$this->songTabTabId = $uuid;
	}
}