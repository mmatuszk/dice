<?php
/*
 * Plugin Name: Dice
 */

add_shortcode('dice', 'mm_dice_shortcode');

function mm_dice_shortcode($attr =[], $content = null) {
    ob_start();
?>
    <div>
        <input type="button" value="Roll" id="dice" class="dice-button">
    <div>
    <script>     
        var dice = (function () {
            var p = {};
            var id;
            var ct = 0;
            
            function randomInt() {
                return Math.floor((Math.random() * 6) + 1);
            }

            function showRandom() {
                var num = randomInt();
                console.log(num);
                jQuery('#dice').prop('value', num);
                if (ct++ > 10) {
                    clearInterval(id);
                    ct = 0;
                }
            }
            
            p.animateRandom = function () {
                console.log('button clicked');
                id = setInterval(showRandom, 50);
            };
            
            return p;
        })();
        
        jQuery('#dice').on('click', function() {
            dice.animateRandom();
        });
    </script>
<?php
    $buf = ob_get_contents();
    ob_end_clean();
    return $buf;
}

function add_dice_css() {
    wp_enqueue_style('dice-css', plugins_url('/public/css/dice.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'add_dice_css');