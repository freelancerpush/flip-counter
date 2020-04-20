=== Flip Counter ===
Author URI: https://www.f5buddy.com/services/wordpress-development/
Tags: social like counter, counter, date and time counter, count flip
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 4.3
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin gives facility to show "Countdown" numbers, Date Countdown and APIs Date countdown.
example if you want you site in maintenance that time you should not show any error to your users. you can show time countdown.  


A few notes about the sections above:

*   "Tested up to" is the highest version that you've *successfully used to test the plugin*. Note that it might work on
higher versions... this is just the highest one you've verified.
*   Stable tag should indicate the Subversion "tag" of the latest stable version, or "trunk," if you use `/trunk/` for
stable.


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. After Activation plugin where you want to use countdown timer and static number

After Install Complete flow below step :- 

Go to your pages menu open any page where you want to show countdown

Here we provide 3 shortcode 

## First shortcode
[flip_counter data-value=1234 data-url='http://example.com/number' data-type='social']

1. data-value
Your countdown start from 
2. data-url 
This is your web service URL where data come but make sure you APIs data should come in json format. and format should be look like below.

{"displays":"120220"}
3. data-type
if you want to use apis data you have to use 'social'


## Second shortcode  
[flip_counter data-value='2018-06-17' data-type='date']

1. data-value
You have to add date format above like YYYY-MM-DD. this will be upcoimg date like today '2018-06-17' you can use next days, next month, next year but make sure you date format should same.
2. data-type 
You are using date countdown so you have to pass 'date'


## Third shortcode
[flip_counter data-value='150008' data-type='number']
1. date-value
This data will be show static where you will add

2. date-type
You have to 'number' string 


== Frequently Asked Questions ==


== Screenshots ==

Installation Shortcode

== A brief Markdown Example ==


Plugin Shortcode 
[flip_counter data-value=1234 data-url='http://example.com/number' data-type='social']

[flip_counter data-value='2018-06-17' data-type='date']
[flip_counter data-value='150008' data-type='number']

Note: - Your API url http://example.com/number Should be return in json format and format will be {"displays":"120220"} You can use this shortcode multiple uses like facebook count, Instagram count, twitter count etc.