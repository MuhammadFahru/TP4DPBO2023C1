<?php

class Author extends DB
{
    function getAuthor()
    {
        $query = "SELECT * FROM authors";
        return $this->execute($query);
    }

    function add($data)
    {
        $author_name = $data['author_name'];
        $author_email = $data['author_email'];

        $query = "insert into authors values ('', '$author_name', '$author_email')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $author_name = $data['author_name'];
        $author_email = $data['author_email'];

        $query = "update authors set
            author_name = '$author_name',
            author_email = '$author_email'
            where author_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM authors WHERE author_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>