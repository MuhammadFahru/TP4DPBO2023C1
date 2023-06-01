<?php

    class AuthorView {
        public function render($data) {
            

            $template = new Template("resources/templates/author.html");

            $template->write(); 
        }
    }

?>