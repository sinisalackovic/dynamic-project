<?php

namespace Model\Domain\Posts;

// uvek mora da vrati instancu nekog drugog objekta !!!
// sluzi samo da kreira neki drugi objekat
class PostEntityFactory
{
	// ovde dolaze sirovi podaci, array pretezno

	public function create(array $data)
	{
		return new PostEntity($data['title'], $data['body'], $data['author']);
	}
	
	public function reconstitute(array $data)
	{
		$entity = new PostEntity($data['title'], $data['body'], $data['author']);
		$entity->setId($data['id']);
		$entity->setTsCreated($data['ts_created']);
		$entity->setTsUpdated($data['ts_modified']);

		return $entity;
	}

}