<?php

namespace Model\Domain\Posts;

// uvek mora da vrati instancu nekog drugog objekta !!!
// sluzi samo da kreira neki drugi objekat
class PostEntityFactory
{
	// ovde dolaze sirovi podaci, array pretezno
	private $data;

	public function create(array $data)
	{
		return new PostEntity($data['title'], $data['body'], $data['author']);
	}
	
	public function reconstitute()
	{
		$entity = new PostEntity($this->data['title'], $this->data['body'], $this->data['author']);
		$entity->setId($this->data['id']);
		$entity->setTsCreated($this->data['ts_created']);
		$entity->setTsUpdated($this->data['ts_modified']);

		return $entity;
	}

	public function set(array $data)
	{
		$this->data = $data;
		return $this;
	}
}