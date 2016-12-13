<?php

namespace Backend\Blog;

/**
 * Class Article
 * @package Backend\Blog
 */
class User
{

    private $id;

    private $email;

    private $name;

    private $password;

    /**
     * @param $id
     * @return User|null
     */
    public static function find($id)
    {
        $users = static::get('id = ' . $id, 'id DESC', 1);
        if (false === empty($users)) {
            return reset($users);
        }

        return null;
    }

    /**
     * @param string $where
     * @param string $order
     * @param int $limit
     * @param int $offset
     * @return User[]
     */
    public static function get($where = '1', $order = 'id DESC', $limit = 100, $offset = 0)
    {
        $db = \Backend\Db\Connect::getInstance();
        $statement = $db->getResource()->prepare('SELECT * FROM users WHERE ' . $where . ' ORDER BY :order LIMIT :limit OFFSET :offset');

        $statement->bindParam(':order', $order, \PDO::PARAM_STMT);
        $statement->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $statement->bindParam(':limit', $limit, \PDO::PARAM_INT);

        $statement->execute();

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($rows as &$row) {
            $record = new static();
            $record->id = $row['id'];
            $record->email = $row['email'];
            $record->name = $row['name'];
            $record->password = $row['password'];
            $row = $record;
        }

        return $rows;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }



}