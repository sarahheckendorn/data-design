<?php

namespace Sarahheckendorn\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class SongTab {
	use ValidateUuid;
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

	/**
	 * SongTab constructor.
	 * @param string|UUID $newSongTabSongId gives the id of SongTabSongID
	 * @param string|UUID $newSongTabTabId gives the ID of SongTabTabId
	 * @throws \InvalidArgumentException if data is not filled out
	 * @throws \RangeException if data exceeds limit
	 * @throws \Exception for any other exception
	 */
	public function __construct($newSongTabSongId, $newSongTabTabId) {
		try{
			$this->setSongTabSongId($newSongTabSongId);
			$this->setSongTabTabId($newSongTabTabId);
			//determines what exception type was thrown
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
	/**
	 * inserts this SongTab into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {
		//create query template
		$query = "INSERT INTO songTab(songTabSongId, songTabTabId) VALUES(:songTabSongId, :songTabTabId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["songTabSongId" => $this->songTabSongId->getBytes(), "songTabTabId" => $this->songTabTabId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * deletes the SongTab from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {
		// create query template
		$query = "DELETE FROM songTab WHERE songTabSongId = :songTabSongId AND songTabTabId = :songTabTabId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder in the template
		$parameters = ["songTabSongId" => $this->songTabSongId->getBytes(), "songTabTabId" => $this->songTabTabId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * updates this SongTab in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {
		// create query template
		$query = "UPDATE songTab SET songTabSongId = :songTabSongId, songTabTabId = :songTabTabId WHERE songTabSongId = :songTabSongId AND songTabTabId = :songTabTabId";
		$statement = $pdo->prepare($query);

		//binds variables to the place holders in the template
		$parameters = ["songTabSongId" => $this->songTabSongId->getBytes(), "songTabTabId" => $this->songTabTabId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * gets the SongTab by songTabSongId and songTabTabId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $songTabSongId and $songTabTabId to search for
	 * @return SongTab|null SongTab found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public static function getSongTabBySongTabSongIdAndSongTabTabId(\PDO $pdo, string $songTabSongId, string $songTabTabId) : ?SongTab {
		//sanitize the string before searching
		try {
			$songTabSongId = self::validateUuid($songTabSongId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		try {
			$songTabTabId\ = self::validateUuid($songTabTabId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}

		//create query template
		$query = "SELECT songTabSongId, songTabTabId FROM songTab WHERE songTabSongId = :songTabSongId AND songTabTabId = :songTabTabId;
		$statement = $pdo->prepare($query);

		//bind the songTabSong id and songTabTab id to the place holder in the template
		$parameters = ["songTabSongId" => $songTabSongId->getBytes(), "songTabTabId" => $songTabTabId->getBytes()];
		$statement->execute($parameters);

		// grab the songTab from mySQL
		try {
			$songTab = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$songTab = new SongTab($row["songTabSongId"], $row["songTabTabId"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($songTab);
	}
	/**
	 * gets the SongTab by songTab Song id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $songTabSongId Song id to search for
	 * @return \SplFixedArray SplFixedArray of SongTabs found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 **/
	public static function getSongTabBySongTabSongId(\PDO $pdo, string $songTabSongId) : \SPLFixedArray {
		try {
			$songTabSongId = self::validateUuid($songTabSongId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		// create query template
		$query = "SELECT songTabSongId, songTabTabId FROM songTab WHERE songTabSongId = :songTabSongId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["songTabSongId" => $songTabSongId->getBytes()];
		$statement->execute($parameters);
		// build an array of songTabs
		$songTabs = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$songTab = new SongTab($row["songTabSongId"], $row["songTabTabId"]);
				$songTabs[$songTabs->key()] = $songTabs;
				$songTab->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($songTab);
	}
/**
	 * gets the SongTab by songTab Tab id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $songTabTabId Tab id to search for
	 * @return \SplFixedArray SplFixedArray of SongTabs found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 **/
	public static function getSongTabBySongTabTabId(\PDO $pdo, string $songTabTabId) : \SPLFixedArray {
		try {
			$songTabTabId = self::validateUuid($songTabTabId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		// create query template
		$query = "SELECT songTabSongId, songTabTabId FROM songTab WHERE songTabTabId = :songTabTabId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["songTabTabId" => $songTabTabId->getBytes()];
		$statement->execute($parameters);
		// build an array of songTabs
		$songTabs = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$songTabs = new SongTab($row["songTabSongId"], $row["songTabTabId"]);
				$songTabs[$songTabs->key()] = $songTabs;
				$songTabs->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($songTabs);
	}
}