<?php

class Borrowing extends DB
{
    function getBorrowing()
    {
        $query = "SELECT borrowings.*, members.name as member_name, books.title as book_title FROM borrowings
            JOIN members ON borrowings.member_id = members.member_id
            JOIN books ON borrowings.book_id = books.book_id";

        return $this->execute($query);
    }

    function getBorrowingById($id)
    {
        $query = "SELECT borrowings.*, members.name as member_name, books.title as book_title FROM borrowings
            JOIN members ON borrowings.member_id = members.member_id
            JOIN books ON borrowings.book_id = books.book_id
            WHERE borrowing_id = '$id'";

        return $this->execute($query);
    }

    function add($data)
    {
        $member_id = $data['member_id'];
        $book_id = $data['book_id'];
        $borrowing_date = $data['borrowing_date'];
        $due_date = $data['due_date'];
        if (empty($data['return_date'])) {
            $return_date = null;
        } else {
            $return_date = $data['return_date'];
        }

        $query = "insert into borrowings values ('', '$member_id', '$book_id', '$borrowing_date', '$due_date', '$return_date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $member_id = $data['member_id'];
        $book_id = $data['book_id'];
        $borrowing_date = $data['borrowing_date'];
        $due_date = $data['due_date'];
        if (empty($data['return_date'])) {
            $return_date = null;
        } else {
            $return_date = $data['return_date'];
        }

        $query = "update borrowings set
            member_id = '$member_id',
            book_id = '$book_id',
            borrowing_date = '$borrowing_date',
            due_date = '$due_date',
            return_date = '$return_date'
            where borrowing_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM borrowings WHERE borrowing_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>