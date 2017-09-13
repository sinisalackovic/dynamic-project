<?php

namespace Model\Domain\Posts;

use G4\DataMapper\Builder;
use Lib\Collection;
use G4\DataMapper\Common\Identity;
use G4\DataMapper\Common\MapperInterface;
use G4\DataMapper\Engine\MySQL\MySQLAdapter;
use G4\DataMapper\Engine\MySQL\MySQLTableName;
use G4\DataMapper\Engine\MySQL\MySQLClientFactory;

class PostRepository
{
    const TABLE_NAME = 'posts';

    public function save(PostEntity $postEntity)
    {
        try{
            $this->makeMapper()->insert(new PostMap($postEntity));
        } catch(\Exception $e){

        }
    }

    public function findById($id)
    {
        try{
            $identity = new Identity();
            $identity->field("id");
            $identity->equal($id);

            $response = $this->makeMapper()->find($identity);

            return PostEntityFactory::reconstitute($response->getOne());

        } catch(\Exception $e){

        }
    }

    public function findAll()
    {
        try{
            $response = $this->makeMapper()->query(
                "SELECT * FROM " . self::TABLE_NAME
            );

            return new Collection($response->getAll(), new PostEntityFactory());
        } catch (\Exception $e){

        }
    }

    public function delete($id)
    {
        try{
            $identity = new Identity();
            $identity->field("id");
            $identity->equal($id);

            $this->makeMapper()->delete($identity);
        } catch (\Exception $e){

        }
    }

    public function update($id, $data)
    {
        $identity = new Identity();
        $identity->field('id');
        $identity->equal($id);

        $this->makeMapper()->update($data, $identity);
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