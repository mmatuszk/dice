<?php
/*
 * Plugin Name: Dice
 */

add_shortcode('dice', 'mm_dice_shortcode');

function mm_dice_shortcode($attr =[], $content = null) {
    ob_start();
?>
    <p>Hello World</p>
    <button>OK</button>
<?php
    $buf = ob_get_contents();
    ob_end_clean();
    return $buf;
}