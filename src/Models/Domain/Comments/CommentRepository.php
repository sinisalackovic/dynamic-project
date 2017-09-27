<?php

namespace Model\Domain\Comments;

use Lib\Collection;
use G4\DataMapper\Builder;
use G4\DataMapper\Engine\MySQL\MySQLAdapter;
use G4\DataMapper\Engine\MySQL\MySQLTableName;
use G4\DataMapper\Engine\MySQL\MySQLClientFactory;

class CommentRepository
{
    const TABLE_NAME = 'comments';

    public function save(CommentEntity $commentEntity)
    {
        try{
            $this->makeMapper()->insert(new CommentMap($commentEntity));
        } catch(\Exception $e){

        }
    }

    public function findAll($post_id)
    {
        try{
            $response = $this->makeMapper()->query(
                "SELECT * FROM " . self::TABLE_NAME . " WHERE post_id=" . $post_id
            );

            return new Collection($response->getAll(), new CommentEntityFactory());
        } catch (\Exception $e){

        }
    }

    /**
     * @return \G4\DataMapper\Common\MapperInterface
     */
    private function makeMapper()
    {
        return Builder::create()
            ->collectionName(new MySQLTableName(self::TABLE_NAME))
            ->adapter($this->mysqlAdapter())
            ->buildMapper();
    }

    /**
     * @return MySQLAdapter
     */
    public static function mysqlAdapter()
    {
        return new MySQLAdapter(
            new MySQLClientFactory([
                'host'      => 'localhost',
                'username'  => 'root',
                'password'  => 'root',
                'dbname'    => 'dynamic_project',
                'port'      => 3306
            ])
        );
    }
}