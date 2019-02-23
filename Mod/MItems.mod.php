<?php

class MItems
{
    private $conn;
    private $id_item;
    private $value;

    public function __construct($_id_item = null)
    {
        $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

        $this->id_item = $_id_item;

        return;

    } // __construct($_primary_key = null)

    public function __destruct() {}

    public function SetValue($_value)
    {
        $this->value = $_value;

        return;

    } // SetValue($_value)

    public function SelectAll()
    {
        $query = 'select ID_ITEM, ITEM
                  from ITEMS
                  order by ID_ITEM';

        $result = $this->conn->prepare($query);

        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetchAll();

    } // SelectAll()

    public function Select()
    {
        $query = "select ID_ITEM, ITEM
                  from ITEMS
                  where ID_ITEM = $this->id_item";

        $result = $this->conn->prepare($query);

        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetch();

    } // Select()

    public function Insert()
    {
          $query = 'insert into ITEMS (ITEM)
                  values (:ITEM)';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ITEM', $this->value['ITEM'], PDO::PARAM_STR);

        $result->execute() or die ($this->ErrorSQL($result));

        $this->primary_key = $this->conn->lastInsertId();

        $this->value['ID_ITEM'] = $this->id_item;

        return $this->value;

    } // Insert()

    public function Update()
    {
        $ITEM = $this->value['ITEM'];

        $query = "update ITEMS
                  set ITEM = '$ITEM'
                  where ID_ITEM = $this->id_item";

        $result = $this->conn->prepare($query);

        $result->execute() or die ($this->ErrorSQL($result));

        $this->value['ID_ITEM'] = $this->id_item;

        return $this->value;

    } // Update()

    public function Delete()
    {
        $query = "delete from ITEMS
                  where ID_ITEM = $this->id_item";

        $result = $this->conn->prepare($query);

        $result->execute() or die ($this->ErrorSQL($result));

    return;

    } // Delete()

    private function ErrorSQL($result)
{
    if (!DEBUG) return;

    $error = $result->errorInfo();

    debug($error);

    return;

} // ErrorSQL($result)

} // MItems