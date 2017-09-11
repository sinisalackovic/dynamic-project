<?php

namespace Model\Domain\Posts;

class PostEntity 
{
	private $title;
	private $body;
	private $author;
	private $ts_created;
	private $ts_updated;

	public function __construct($title, $body, $author)
	{
		$this->title  = $title;
		$this->body   = $body;
		$this->author = $author;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getTsCreated()
	{
		return $this->ts_created;
	}

	public function getTsUpdated()
	{
		return $this->ts_updated;
	}

	public function setTsCreated($tsCreated)
	{
		$this->ts_created = $tsCreated;
		return $this;
	}

	public function setTsUpdated($tsUpdated)
	{
		$this->ts_updated = $tsUpdated;
		return $this;
	}
}