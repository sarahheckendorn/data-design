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
}