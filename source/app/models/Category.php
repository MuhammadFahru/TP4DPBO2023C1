<?php

class Category extends DB
{
    function getCategory()
    {
        $query = "SELECT * FROM categories";
        return $this->execute($query);
    }

    function add($data)
    {
        $category_name = $data['category_name'];

        $query = "insert into categories values ('', '$category_name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $category_name = $data['category_name'];

        $query = "update categories set
            category_name = '$category_name'
            where category_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM categories WHERE category_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>