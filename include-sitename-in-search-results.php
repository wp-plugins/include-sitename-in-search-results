<?php
/**
Plugin Name: Include Sitename in Search Results
Plugin URI: http://apasionados.es
Description: Adds the JSON-LD schema.org markupto include the "Include Your Site Name in Search Results" on the homepage. This new feature was presented on the <a href="http://googlewebmastercentral.blogspot.com.es/2015/04/better-presentation-of-urls-in-search.html" target="_blank">Official Google Webmaster Central Blog</a> (Thursday, April 16, 2015 ). There is more info on the <a href="https://developers.google.com/structured-data/site-name">Google Developers Website</a>.
Version: 1.0
Author: Apasionados.es
Author URI: http://apasionados.es
License: GPL2
Text Domain: ap_include_sitename_search_results
*/
 
 /*  Copyright 2014  Apasionados.es  (email: info@apasionados.es)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$plugin_header_translate = array( __('Include Sitename in Search Results', 'ap_include_sitename_search_results'), __('Adds the JSON-LD schema.org markupto include the "Include Your Site Name in Search Results" on the homepage. This new feature was presented on the <a href="http://googlewebmastercentral.blogspot.com.es/2015/04/better-presentation-of-urls-in-search.html" target="_blank">Official Google Webmaster Central Blog</a> (Thursday, April 16, 2015 ). There is more info on the <a href="https://developers.google.com/structured-data/site-name">Google Developers Website</a>.', 'ap_include_sitename_search_results') );

add_action( 'admin_init', 'ap_include_sitename_search_results_load_language' );
function ap_include_sitename_search_results_load_language() {
	load_plugin_textdomain( 'ap_include_sitename_search_results', false,  dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function ap_include_sitename_search_results (){
    if ( is_front_page() ) {
		$ap_issr_options = get_option('ap_issr');
		$ap_issr_options_name =	$ap_issr_options['ap_issr_name'];
			if (empty($ap_issr_options_name)) { $ap_issr_options_name = get_bloginfo('name'); }
		$ap_issr_options_alternateName = $ap_issr_options['ap_issr_alternateName'];
		//	if (empty($ap_issr_options_alternateName)) { $ap_issr_options_alternateName = preg_replace('/^www\./','',$_SERVER['SERVER_NAME']); }
        echo PHP_EOL . '<script type="application/ld+json">' . PHP_EOL;
        echo '{' . PHP_EOL;
        echo '  "@context": "http://schema.org",' . PHP_EOL;
        echo '  "@type": "WebSite",' . PHP_EOL;
        echo '  "name": "' . $ap_issr_options_name . '",' . PHP_EOL;
		if (!empty($ap_issr_options_alternateName)) {
	        echo '  "alternateName": "' . $ap_issr_options_alternateName . '",' . PHP_EOL;
		}
        echo '  "url": "' . get_site_url() . '/"' . PHP_EOL;
        echo '}' . PHP_EOL;
        echo '</script>' . PHP_EOL;
        }
} 
add_action( 'wp_footer', 'ap_include_sitename_search_results', 10000 );


class ApISSRSettingsPage
{
    private $options;
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
    public function add_plugin_page()
    {
        add_options_page(
            __( 'Include Sitename in Search Result', 'ap_include_sitename_search_results' ), 
            __( 'Include Sitename in Search Result', 'ap_include_sitename_search_results' ),
            'manage_options', 
            'ap-issr-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }
    public function create_admin_page()
    {
        $this->options = get_option( 'ap_issr' );
        ?>
        <div class="wrap">
            <h2><?php _e('Include Sitename in Search Result Settings', 'ap_include_sitename_search_results'); ?></h2>
            <form method="post" action="options.php">
            <?php
                settings_fields( 'ap_issr_group' );   
                do_settings_sections( 'ap-issr-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }
    public function page_init()
    {        
        register_setting(
            'ap_issr_group', // Option group
            'ap_issr', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'ap_issr_setting_section_id', // ID
            __( 'Custom Settings for "Include Sitename in Search Result"', 'ap_include_sitename_search_results' ), // Title
            array( $this, 'print_section_info' ), // Callback
            'ap-issr-setting-admin' // Page
        );  

        add_settings_field(
            'ap_issr_name', // ID
            __( 'Website Name:', 'ap_include_sitename_search_results' ), // Title 
            array( $this, 'ap_issr_name_callback' ), // Callback
            'ap-issr-setting-admin', // Page
            'ap_issr_setting_section_id' // Section           
        );      

        add_settings_field(
            'ap_issr_alternateName', 
            __( 'Alternative Website Name:', 'ap_include_sitename_search_results' ),
            array( $this, 'ap_issr_alternateName_callback' ), 
            'ap-issr-setting-admin', 
            'ap_issr_setting_section_id'
        );      
    }
    public function sanitize( $input )
    {
        if( isset( $input['ap_issr_name'] ) )
            $new_input['ap_issr_name'] = sanitize_text_field( $input['ap_issr_name'] );
        if( isset( $input['ap_issr_alternateName'] ) )
            $new_input['ap_issr_alternateName'] = sanitize_text_field( $input['ap_issr_alternateName'] );
        return $new_input;
    }
    public function print_section_info()
    {
		print '<p>' . __('This plugin includes the structured data markup to indicate the preferred name you want Google to display in Search results instead of the domain name. You can also provide more than one possible name for your site, and let Google Search algorithms choose between them.', 'ap_include_sitename_search_results' ) . '</p>';
		print '<p>' . __('If the first option: "Website Name" is empty, the website title (set in Settings / General) will be used.', 'ap_include_sitename_search_results' ) . '</p>';
		print '<p>' . __('If the second option: "Alternative Website Name" is empty, no alternative website name will be included in the markup.', 'ap_include_sitename_search_results' ) . '</p>';
    }
    public function ap_issr_name_callback()
    {
        printf(
            '<input type="text" id="ap_issr_name" name="ap_issr[ap_issr_name]" value="%s" />',
            isset( $this->options['ap_issr_name'] ) ? esc_attr( $this->options['ap_issr_name']) : ''
        );
    }
    public function ap_issr_alternateName_callback()
    {
        printf(
            '<input type="text" id="ap_issr_alternateName" name="ap_issr[ap_issr_alternateName]" value="%s" />',
            isset( $this->options['ap_issr_alternateName'] ) ? esc_attr( $this->options['ap_issr_alternateName']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new ApISSRSettingsPage();


?>