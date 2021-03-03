<?php
    function swing_lite_header_layout_type( $control ) {
        if ( $control->manager->get_setting('swing_lite_header_layouts_setting')->value() == 'layout1' ) {
            return true;
        } else {
            return false;
        }
    }