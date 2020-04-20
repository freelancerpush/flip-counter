<?php
/*
plugin Name: Flip Counter
plugin url : https://www.f5buddy.com
version: 1.1
Author: F5 Buddy
Author url: https://www.f5buddy.com
Description: This plugin automatically update flip count on your website. shortcode 

[flip_counter data-value=1234 data-url="http://example.com/number" data-type='social']

[flip_counter data-value="2018-06-17" data-type='date']
[flip_counter data-value="150008" data-type='number']

*/

## This function use js and css for couter design
function wptuts_scripts_flip_counter()
{
    wp_register_script( 'flip-script', plugins_url( '/js/flip.min.js', __FILE__ ) );
    wp_enqueue_script( 'flip-script' );
    wp_register_style( 'flip-css', plugins_url( '/css/flip.min.css', __FILE__ ) );
    wp_enqueue_style( 'flip-css' );
    
    wp_register_style( 'flip-css-css', plugins_url( '/css/flip.css', __FILE__ ) );
    wp_enqueue_style( 'flip-css-css' );

    wp_register_style( 'flip_custome_css', plugins_url( '/css/flip_custome_css.css', __FILE__ ) );
    wp_enqueue_style( 'flip_custome_css' );
    ?>
    <script>

        function setupFlip(tick) {
            // The Tick `interval` function
            // helps to quickly setup a timer
            var url = this._element.dataset.url;
            debugger;
            Tick.helper.interval(function() {
            		var xhttp = new XMLHttpRequest();
                		xhttp.onreadystatechange = function() {
                		if (this.readyState == 4 && this.status == 200) {
                			
                           var myObj = JSON.parse(this.responseText);
                           tick.value = myObj.displays;
                			//tick.value=this.responseText;
                		}
                		};
            		xhttp.open("GET", url, true);
            		xhttp.send();
            }, 1000);
        }

        function handleTickInit(tick) {
            debugger;
            var _flip_d_value = this._element.dataset.date;
            var mycounter_date_value = _flip_d_value+'T10:00:00+01:00';
            // format of due date is ISO8601
            // https://en.wikipedia.org/wiki/ISO_8601

            // '2018-01-31T12:00:00'        to count down to the 31st of January 2018 at 12 o'clock
            // '2019'                       to count down to 2019
            // '2018-01-15T10:00:00+01:00'  to count down to the 15th of January 2018 at 10 o'clock in timezone GMT+1
            // create the countdown counter
            var counter = Tick.count.down(mycounter_date_value);
            counter.onupdate = function(value) {
              tick.value = value;
            };
            counter.onended = function() {
            };
        }

    </script>
    <?php
    }

    add_action('wp_footer', 'wptuts_scripts_flip_counter');
    ## This function generate shortcode include UI and logic  
    function flip_counter_shortcode( $atts, $content = null ) { 
            $a = shortcode_atts( array(
            'data-value' => '1234',
            'data-url'  =>  '',
            'data-type'  =>  'social',
            ), $atts );

            $social = '<div class="tick" data-value="' . esc_attr($a['data-value']) . '" data-did-init="setupFlip" data-url="' . esc_attr($a['data-url']) . '">
                <div data-repeat="true">
                    <span data-view="flip"></span>
                </div>
            </div>';

            $counter = '<div class="tick" data-did-init="handleTickInit" data-date="' . esc_attr($a['data-value']) . '">

                <div data-repeat="true" data-layout="horizontal fit" data-transform="preset(d, h, m, s) -> delay">
                    <div class="tick-group">
                        <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                            <span data-view="flip"></span>
                        </div>
                        <span data-key="label" data-view="text" class="tick-label"></span>
                    </div>
                </div>
            </div>
            ';

            $number = '<div class="tick" data-value="'. esc_attr($a['data-value']).'">
                <div data-repeat="true">
                    <span data-view="flip"></span>
                </div>
            </div>';

            if(isset($a['data-type']) && $a['data-type']=="social"){
                return $social;
            }elseif($a['data-type']=="date"){
                return $counter;
            }elseif($a['data-type']=="number"){
                return $number;
            }
    }
    add_shortcode( 'flip_counter', 'flip_counter_shortcode' );