<?php

class Book extends DB
{
    function getBook()
    {
        $query = "SELECT * FROM books";
        return $this->execute($query);
    }

    function getBookById($id)
    {
        $query = "SELECT books.*, categories.category_name AS category_name, authors.author_name AS author_name FROM books JOIN categories ON books.category_id = categories.category_id JOIN authors ON books.author_id = authors.author_id WHERE books.book_id = '$id'";

        return $this->execute($query);
    }

    function add($data)
    {
        $title = $data['title'];
        $category_id = $data['category_id'];
        $author_id = $data['author_id'];
        $publication_date = $data['publication_date'];
        $isbn = $data['isbn'];
        $availability = $data['availability'];

        $query = "insert into books values ('', '$title', '$category_id', '$author_id', '$publication_date', '$isbn', '$availability')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $title = $data['title'];
        $category_id = $data['category_id'];
        $author_id = $data['author_id'];
        $publication_date = $data['publication_date'];
        $isbn = $data['isbn'];
        $availability = $data['availability'];

        $query = "update books set
            title = '$title',
            category_id = '$category_id',
            author_id = '$author_id',
            publication_date = '$publication_date',
            isbn = '$isbn',
            availability = '$availability'
            where book_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM books WHERE book_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}


?>