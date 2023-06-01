<?php

    class BorrowingView {
        public function render($data) {
            $no = 1;
            $data_borrowing = null;
            $data_member = null;
            $data_book = null;

            foreach($data['borrowing'] as $val){
                $val;
                $data_borrowing .= "<tr valign='middle'>
                        <td class='text-center'>" . $no++ . "</td>
                        <td class='text-start ps-3'>" . $val['member_name'] . "</td>
                        <td class='text-start ps-3'>" . $val['book_title'] . "</td>
                        <td class='text-center'>" . $val['borrowing_date'] . "</td>
                        <td class='text-center'>" . $val['due_date'] . "</td>";
                
                if (!empty($val['return_date'])) {
                    if ($val['return_date'] > $val['due_date']) {
                        $data_borrowing .= "<td class='text-center'>
                            <p>" . $val['return_date'] . "</p>
                            <h6><span class='badge bg-danger'>Telat</span></h6>
                        </td>";
                    } else {
                        if ($val['return_date'] == '0000-00-00') {
                            $data_borrowing .= "<td class='text-center'><h6><span class='badge bg-warning'>Masih Dipinjam</span></h6></td>";
                        } else {
                            $data_borrowing .= "<td class='text-center'>
                                <p>" . $val['return_date'] . "</p>
                                <h6><span class='badge bg-success'>Tepat Waktu</span></h6>
                            </td>";
                        }
                    }
                } else {
                    $data_borrowing .= "<td class='text-center'><h6><span class='badge bg-warning'>Masih Dipinjam</span></h6></td>";
                }
                $data_borrowing .= "
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a href='index.php?id_edit=" . $val['borrowing_id'] .  "' class='btn btn-sm btn-warning w-100 me-1' '>Edit</a>
                                <a href='index.php?id_hapus=" . $val['borrowing_id'] . "' class='btn btn-sm btn-danger w-100 ms-1 confirmation' '>Hapus</a>
                            </div>
                        </td>";
                $data_borrowing .= "</tr>";
            }

            foreach($data['member'] as $val){
                list($member_id, $name) = $val;
                $data_member .= "<option value='".$member_id."'>".$name."</option>";
            }

            foreach($data['book'] as $val){
                list($book_id, $title) = $val;
                $data_book .= "<option value='".$book_id."'>".$title."</option>";
            }

            $template = new Template("resources/templates/borrowing.html");
            $template->replace("MEMBER_OPTIONS", $data_member);
            $template->replace("BOOK_OPTIONS", $data_book);
            $template->replace("DATA_TABEL", $data_borrowing);
            $template->replace("DATA_LINK", 'index.php');
            $template->replace("DATA_BUTTON", '<button type="submit" class="btn btn-primary" name="add">Simpan</button>');
            $template->write(); 
        }

        public function renderEdit($data, $borrowing) {
            $no = 1;
            $data_borrowing = null;
            $data_member = null;
            $data_book = null;

            foreach($data['borrowing'] as $val){
                $val;
                $data_borrowing .= "<tr valign='middle'>
                        <td class='text-center'>" . $no++ . "</td>
                        <td class='text-start ps-3'>" . $val['member_name'] . "</td>
                        <td class='text-start ps-3'>" . $val['book_title'] . "</td>
                        <td class='text-center'>" . $val['borrowing_date'] . "</td>
                        <td class='text-center'>" . $val['due_date'] . "</td>";
                
                if (!empty($val['return_date'])) {
                    if ($val['return_date'] > $val['due_date']) {
                        $data_borrowing .= "<td class='text-center'>
                            <p>" . $val['return_date'] . "</p>
                            <h6><span class='badge bg-danger'>Telat</span></h6>
                        </td>";
                    } else {
                        if ($val['return_date'] == '0000-00-00') {
                            $data_borrowing .= "<td class='text-center'><h6><span class='badge bg-warning'>Masih Dipinjam</span></h6></td>";
                        } else {
                            $data_borrowing .= "<td class='text-center'>
                                <p>" . $val['return_date'] . "</p>
                                <h6><span class='badge bg-success'>Tepat Waktu</span></h6>
                            </td>";
                        }
                    }
                } else {
                    $data_borrowing .= "<td class='text-center'><h6><span class='badge bg-warning'>Masih Dipinjam</span></h6></td>";
                }
                $data_borrowing .= "
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a href='index.php?id_edit=" . $val['borrowing_id'] .  "' class='btn btn-sm btn-warning w-100 me-1' '>Edit</a>
                                <a href='index.php?id_hapus=" . $val['borrowing_id'] . "' class='btn btn-sm btn-danger w-100 ms-1 confirmation' '>Hapus</a>
                            </div>
                        </td>";
                $data_borrowing .= "</tr>";
            }

            foreach($data['member'] as $val){
                list($member_id, $name) = $val;
                $select = ($member_id == $borrowing['member_id']) ? 'selected' : "";
                $data_member .= "<option value='".$member_id."' " . $select . ">".$name."</option>";
            }

            foreach($data['book'] as $val){
                list($book_id, $title) = $val;
                $select = ($book_id == $borrowing['book_id']) ? 'selected' : "";
                $data_book .= "<option value='".$book_id."' " . $select . ">".$title."</option>";
            }

            $template = new Template("resources/templates/borrowing.html");
            $template->replace("MEMBER_OPTIONS", $data_member);
            $template->replace("BOOK_OPTIONS", $data_book);
            $template->replace("DATA_BORROWING_DATE", $borrowing['borrowing_date']);
            $template->replace("DATA_DUE_DATE", $borrowing['due_date']);
            $template->replace("DATA_RETURN_DATE", ($borrowing['return_date'] == '0000-00-00') ? '' : $borrowing['return_date']);
            $template->replace("DATA_TABEL", $data_borrowing);
            $template->replace("DATA_LINK", 'index.php?id_update=' . $borrowing['borrowing_id'] . '');
            $template->replace("DATA_BUTTON", '<button type="submit" class="btn btn-warning" name="update">Ubah</button>');
            $template->write(); 
        }
    }

?>