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



}