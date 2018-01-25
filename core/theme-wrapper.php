<?php
/**
 * Theme Wrapper
 *
 * @link http://roots.io/an-introduction-to-the-roots-theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */
function template_path() {
    return Theme_Wrapping::$main_template;
}
class Theme_Wrapping {
    // Stores the full path to the main template file
    static $main_template;
    public function __toString() {
        return locate_template('core/layout-loader.php');
    }
    static function wrap($main) {
        self::$main_template = $main;
        return new Theme_Wrapping();
    }
}
add_filter('template_include', array('Theme_Wrapping', 'wrap'), 99);