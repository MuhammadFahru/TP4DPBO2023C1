<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $joining_date = $data['joining_date'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$joining_date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $joining_date = $data['joining_date'];

        $query = "update members set
            name = '$name',
            email = '$email',
            phone = '$phone',
            joining_date = '$joining_date'
            where member_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE member_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>