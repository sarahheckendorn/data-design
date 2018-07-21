<?php

class Tab {
	/**
	 * id for the tab; this is the primary key
	 * @var $tabId
	 */
	private $tabId;
	/**
	 * author that wrong the song
	 * @var $tabImageUrl
	 */
	private $tabImageUrl;

	/**
	 * Tab constructor.
	 * @param string|UUID $newTabId gives ID of this TabID
	 * @param string|UUID $newTabImageUrl gives ID of this Image Url
	 * @throws \InvalidArgumentException if data is not filled out
	 * @throws \RangeException if data exceeds limit
	 * @throws \Exception for any other exception
	 */
	public function __construct($newTabId, string $newTabImageUrl) {
		try{
			$this->setTabId($newTabId);
			$this->setTabImageUrl($newTabImageUrl);
			//determines what exception type was thrown
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

/**
 * accessor method for tab Id
 *
 * @return Uuid value of tab id
 */
	public function getTabId() :Uuid {
		return ($this->tabId);
	}
	/**
	 * mutator method for tabId
	 *
	 * @param Uuid/string $newTabId new value of tabId
	 * @throws \RangeException if $newTabId is not alphanumeric
	 * @throws \TypeError if $newTabId is not uuid
	 */

	public function setTabId($newTabId) : void {
		try {
			$uuid = self::validateUuid($newTabId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the tab Id
		$this->tabId = $uuid;
	}

/**
 * accessor method for tabImageUrl
 *
 * @return string value of tab Image Url
 */

	public function getTabImageUrl() :string {
		return($this->tabImageUrl);
	}
/**
 * mutator method for tabImageUrl
 *
 * @param string $newTabImageUrl new value of tabImageUrl
 * @throws \InvalidArgumentException if $newTabImageUrl is not a string or insecure
 * @throws \RangeException if $newTabImageUrl is > 255 characters
 * @throws \TypeError if $newTabImageUrl is not a string
 */
	public function setTabImageUrl(string $newTabImageUrl) : void {
	//verify that tabImageUrl is secure
	$newTabImageUrl = trim($newTabImageUrl);
	$newTabImageUrl = filter_var($newTabImageUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newTabImageUrl) === true){
		throw(new \InvalidArgumentException("Tab Image URL cannot be empty"));
	}
		//verify that tab Image Url will fit in the database
		if(strlen($newTabImageUrl) > 255) {
			throw(new \RangeException("Tab Image URL characters exceed limit"));
		}
	$this->tabImageUrl = $newTabImageUrl;
	}
	/**
	 * inserts this tabId into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		// create query template
		$query = "INSERT INTO tab(tabId, tabImageUrl) VALUES (:tabId, :tabImageUrl)";
		$statement = $pdo->prepare($query);
		$parameters = ["tabId" => $this->tabId->getBytes(), "tabImageUrl" => $this->tabImageUrl];
		$statement->execute($parameters);
	}
	/**
	 * deletes this tabId from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		// create query template
		$query = "DELETE FROM tab WHERE tabId = :tabId";
		$statement = $pdo->prepare($query);
		//bind the member variables to the place holders in the template
		$parameters = ["tabId" => $this->tabId->getBytes()];
		$statement->execute($parameters);
	}
	/**
	 * updates this Tab from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 **/
	public function update(\PDO $pdo): void {
		// create query template
		$query = "UPDATE tab SET tabImageUrl = :tabImageUrl WHERE tabId = :tabId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["tabId" => $this->tabId->getBytes(), "tabImageUrl" => $this->tabImageUrl];
		$statement->execute($parameters);
	}
	/**
	 * gets the Tab by tab id
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param string $tabId Tab Id to search for
	 * @return Tab|null Tab or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getTabByTabId(\PDO $pdo, string $tabId):?Tab {
		// sanitize the tab id before searching
		try {
			$tabId = self::validateUuid($tabId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		// create query template
		$query = "SELECT tabId, tabImageUrl FROM tab WHERE tabId = :tabId";
		$statement = $pdo->prepare($query);
		// bind the tab id to the place holder in the template
		$parameters = ["tabId" => $tabId->getBytes()];
		$statement->execute($parameters);
		// grab the Tab from mySQL
		try {
			$tab = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$tab = new Tab($row["tabId"], $row["tabImageUrl"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($tab);
	}
}