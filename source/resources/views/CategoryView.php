<?php

    class CategoryView {
        public function render($data) {
            

            $template = new Template("resources/templates/category.html");

            $template->write(); 
        }
    }

?>