<?php

    class MemberView {
        public function render($data) {
            

            $template = new Template("resources/templates/member.html");

            $template->write(); 
        }
    }

?>