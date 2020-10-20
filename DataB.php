<?php
class DataB
{
    protected \PDO $connect;

    public function __construct()
    {
        $this->connect = new \PDO ('mysql:dbname=stock;host=localhost:3306', 'root', 'root');
    }

//users table

    public function SelectUsers()
    {
        $statement = $this->connect->query('SELECT * FROM users');
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function InsertLogPas($values = [])
    {
        $statement = $this->connect->prepare('INSERT INTO `users`(`login`,`password`) VALUE (?,?)');
        $statement->execute($values);
    }

    public function DeleteUser($value)
    {
        $statement = $this->connect->prepare('DELETE FROM users WHERE id = (?)');
        $statement->execute([$value]);
    }

//image table

    public function SelectImage()
    {
        $statement = $this->connect->query('SELECT * FROM image');
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function InsertImage($values = [])
    {
        $statement = $this->connect->prepare('INSERT INTO `image`(`imageName`,`name`,`user_id`,`number`,`price`) VALUES (?,?,?,?,?)');
        $statement->execute($values);
    }

    public function DeleteImage()
    {
        $statement = $this->connect->prepare('DELETE FROM image WHERE imageName = (?)');
        $statement->execute([$_GET['id']]);
    }

    public function UpdateImage($value = [])
    {
        $statement = $this->connect->prepare('UPDATE image SET number = number - (?) WHERE `id` = (?)');
        $statement->execute($value);
    }

    public function AddImageNumber($value = [])
    {
        $statement = $this->connect->prepare('UPDATE image SET number = number + (?) WHERE `id` = (?)');
        $statement->execute($value);
    }
    public function UpdateImageNumber($value,$value2)
    {
        $statement = $this->connect->prepare('UPDATE image SET price = (?) WHERE `id` = (?)');
        $statement->execute([$value,$value2]);
    }

//personal stock table

    public function UpdatePersonalStockMinus($value,$value2)
    {
        $statement = $this->connect->prepare('UPDATE personal_stock SET number_have = number_have - (?) WHERE `user_id` = (?)');
        $statement->execute([$value,$value2]);
    }
    public function DeletePersonalStock($values = [])
    {
        $statement = $this->connect->prepare('DELETE FROM personal_stock WHERE id = (?)');
        $statement->execute($values);
    }
    public function InsertPersonalStock($values = [])
    {
        $statement = $this->connect->prepare('INSERT INTO `personal_stock`(`number_have`,`image_id`,`user_id`) VALUES (?,?,?)');
        $statement->execute($values);
    }
    public function SelectPersonalStock()
    {
        $statement = $this->connect->query('SELECT * FROM personal_stock');
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function UpdatePersonalStock($value,$value2)
    {
        $statement = $this->connect->prepare('UPDATE personal_stock SET number_have = number_have + (?) WHERE `user_id` = (?)');
        $statement->execute([$value,$value2]);
    }

}