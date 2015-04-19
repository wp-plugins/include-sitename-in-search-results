=== Include Sitename in Search Results ===
Contributors: apasionados
Donate link: http://apasionados.es/
Tags: search engines, Site Name in Search Results, google, Site Name, Search Results, schema.org, JSON-LD
Requires at least: 3.0.1
Tested up to: 4.1.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds the JSON-LD schema.org markup for including the Site Name in Search Results on the homepage.


== Description ==

This plugin adds the JSON-LD schema.org markup for including the Site Name in Search Results on the homepage.

This new feature was presented on the <a href="http://googlewebmastercentral.blogspot.com.es/2015/04/better-presentation-of-urls-in-search.html" target="_blank">Official Google Webmaster Central Blog</a> (Thursday, April 16, 2015 ). There is more info on the <a href="https://developers.google.com/structured-data/site-name">Google Developers Website</a>.

Use structured data markup on your public website to indicate the preferred name you want Google to display in Search results. You can also provide more than one possible name for your site, and let Google Search algorithms choose between them. Once Google has crawled and indexed the updated page, we can use the provided name in Search results as shown in the screenshot.

= What can I do with this plugin? =
This plugin adds the JSON-LD schema.org markup for including the Site Name in Search Results on the homepage.

After activating the plugin you have to configure the Name you want Google to display in your search results instead of the domain name. 

When Google next crawls your page, its indexing algorithms will process the site name specified by your markup and make it eligible to be used in Search results. Note: It can take some time before you see a change to the presentation of your site in Search results. Also, Google's algorithms might choose not to use the name you provided, or not might choose to show the domain name instead.

= INCLUDE SITENAME IN SEARCH RESULTS in your Language! =
This first release is avaliable in English and Spanish. In the languages folder we have included the necessary files to translate this plugin.

If you would like the plugin in your language and you're good at translating, please drop us a line at [Contact us](http://apasionados.es/contacto/index.php?desde=wordpress-org-includesitenamesearchresults-home).

= Further Reading =
You can access the description of the plugin in Spanish at: [Include Sitename in Search Results en castellano](http://apasionados.es/blog/).

== Installation ==

1. Upload the `sitelinks-search-box` folder to the `/wp-content/plugins/` directory (or to the directory where your WordPress plugins are located)
1. Activate the INCLUDE SITENAME IN SEARCH RESULTS plugin through the 'Plugins' menu in WordPress.
1. Go to settings / Include Sitename in Search Results and configure the website name and the alternative website name. If you don't configure them, the plugin uses the site name (set in SETTINGS / GENERAL).

Please use with *WordPress MultiSite* at your own risk, as it has not been tested.

== Frequently Asked Questions ==

= What is INCLUDE SITENAME IN SEARCH RESULTS good for? =
This plugin adds the JSON-LD schema.org markup for including the Site Name in Search Results on the homepage.

= Does INCLUDE SITENAME IN SEARCH RESULTS make changes to the database? =
The plugin creates a new option in the options table: ap_issr with values ap_issr_name and ap_issr_alternateName where the settings of the domain name and alternative domain name are saved.

= How can I check out if the plugin works for me? =
Install and activate. Empty cache (if any cache plugin installed) and have a look at the source code of the homepage. At the end there should be the JSON-LD markup.
You can also check with the [Structured Data Linter](http://linter.structured-data.org/) that the JSON-LD markup is correctly implemented.
Or you can check with it (Google Developer)[https://developers.google.com/structured-data/testing-tool/] but you have to be logged in a Google account.

= How can I remove INCLUDE SITENAME IN SEARCH RESULTS? =
You can simply activate, deactivate or delete it in your plugin management section.

= Are there any known incompatibilities? =
Please don't use it with *WordPress MultiSite*, as it has not been tested.

= Do you make use of INCLUDE SITENAME IN SEARCH RESULTS yourself? = 
Of course we do. ;-)

== Screenshots ==

1. INCLUDE SITENAME IN SEARCH RESULTS Settings page
2. Homepage source code example and check with Testing Tool
3. Example of search results with implemented markup

== Changelog ==

= 1.0 =
* First release.

= 0.5 =
* Beta release.

== Upgrade Notice ==

= 1.0 =
First release.

== Contact ==

For further information please send us an [email](http://apasionados.es/contacto/index.php?desde=wordpress-org-includesitenamesearchresults-contact).

== Translating WordPress Plugins ==

The steps involved in translating a plugin are:

1. Run a tool over the code to produce a POT file (Portable Object Template), simply a list of all localizable text. Our plugins allready havae this POT file in the /languages/ folder.
1. Use a plain text editor or a special localization tool to generate a translation for each piece of text. This produces a PO file (Portable Object). The only difference between a POT and PO file is that the PO file contains translations.
1. Compile the PO file to produce a MO file (Machine Object), which can then be used in the theme or plugin.

In order to translate a plugin you will need a special software tool like [poEdit](http://www.poedit.net/), which is a cross-platform graphical tool that is available for Windows, Linux, and Mac OS X.

The naming of your PO and MO files is very important and must match the desired locale. The naming convention is: `language_COUNTRY.po` and plugins have an additional naming convention whereby the plugin name is added to the filename: `pluginname-fr_FR.po`

That is, the plugin name name must be the language code followed by an underscore, followed by a code for the country (in uppercase). If the encoding of the file is not UTF-8 then the encoding must be specified. 

For example:

* en_US – US English
* en_UK – UK English
* es_ES – Spanish from Spain
* fr_FR – French from France
* zh_CN – Simplified Chinese

A list of language codes can be found [here](http://en.wikipedia.org/wiki/ISO_639), and country codes can be found [here](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). A full list of encoding names can also be found at [IANA](http://www.iana.org/assignments/character-sets).
