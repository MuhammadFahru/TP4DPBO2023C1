<?php

    class BookView {
        public function render($data) {
            $no = 1;
            $data_book = null;
            $data_category = null;
            $data_author = null;

            foreach($data['book'] as $val){
                $data_book .= "<tr valign='middle'>
                    <td class='text-center'>" . $no++ . "</td>
                    <td class='text-start ps-3'>" . $val['title'] . "</td>
                    <td class='text-start ps-3'>" . $val['category_name'] . "</td>
                    <td class='text-center'>" . $val['author_name'] . "</td>
                    <td class='text-center'>" . $val['publication_date'] . "</td>
                    <td class='text-center'>" . $val['isbn'] . "</td>
                    <td class='text-center'>" . $val['availability'] . "</td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <a href='book.php?id_edit=" . $val['book_id'] .  "' class='btn btn-sm btn-warning w-100 me-1' '>Edit</a>
                            <a href='book.php?id_hapus=" . $val['book_id'] . "' class='btn btn-sm btn-danger w-100 ms-1 confirmation' '>Hapus</a>
                        </div>
                    </td>
                </tr>";
            }

            foreach($data['category'] as $val){
                list($category_id, $name) = $val;
                $data_category .= "<option value='".$category_id."'>".$name."</option>";
            }

            foreach($data['author'] as $val){
                list($author_id, $title) = $val;
                $data_author .= "<option value='".$author_id."'>".$title."</option>";
            }

            $template = new Template("resources/templates/book.html");
            $template->replace("CATEGORY_OPTIONS", $data_category);
            $template->replace("AUTHOR_OPTIONS", $data_author);
            $template->replace("DATA_TABEL", $data_book);
            $template->replace("DATA_LINK", 'book.php');
            $template->replace("DATA_BUTTON", '<button type="submit" class="btn btn-primary" name="add">Simpan</button>');
            $template->write(); 
        }

        public function renderEdit($data, $book) {
            $no = 1;
            $data_book = null;
            $data_category = null;
            $data_author = null;

            foreach($data['book'] as $val){
                $data_book .= "<tr valign='middle'>
                    <td class='text-center'>" . $no++ . "</td>
                    <td class='text-start ps-3'>" . $val['title'] . "</td>
                    <td class='text-start ps-3'>" . $val['category_name'] . "</td>
                    <td class='text-center'>" . $val['author_name'] . "</td>
                    <td class='text-center'>" . $val['publication_date'] . "</td>
                    <td class='text-center'>" . $val['isbn'] . "</td>
                    <td class='text-center'>" . $val['availability'] . "</td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <a href='book.php?id_edit=" . $val['book_id'] .  "' class='btn btn-sm btn-warning w-100 me-1' '>Edit</a>
                            <a href='book.php?id_hapus=" . $val['book_id'] . "' class='btn btn-sm btn-danger w-100 ms-1 confirmation' '>Hapus</a>
                        </div>
                    </td>
                </tr>";
            }

            foreach($data['category'] as $val){
                list($category_id, $name) = $val;
                $select = ($category_id == $book['category_id']) ? 'selected' : "";
                $data_category .= "<option value='".$category_id."' " . $select . ">".$name."</option>";
            }

            foreach($data['author'] as $val){
                list($author_id, $title) = $val;
                $select = ($author_id == $book['author_id']) ? 'selected' : "";
                $data_author .= "<option value='".$author_id."' " . $select . ">".$title."</option>";
            }

            $template = new Template("resources/templates/book.html");
            $template->replace("CATEGORY_OPTIONS", $data_category);
            $template->replace("AUTHOR_OPTIONS", $data_author);
            $template->replace("DATA_TITLE", $book['title']);
            $template->replace("DATA_PUBLICATION_DATE", $book['publication_date']);
            $template->replace("DATA_ISBN", $book['isbn']);
            $template->replace("DATA_AVAILABILITY", $book['availability']);
            $template->replace("DATA_TABEL", $data_book);
            $template->replace("DATA_LINK", 'book.php?id_update=' . $book['book_id'] . '');
            $template->replace("DATA_BUTTON", '<button type="submit" class="btn btn-warning" name="update">Ubah</button>');
            $template->write(); 
        }
    }

?>