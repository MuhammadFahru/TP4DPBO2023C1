<?php

    class BookView {
        public function render($data) {
            

            $template = new Template("resources/templates/book.html");

            $template->write(); 
        }
    }

?>