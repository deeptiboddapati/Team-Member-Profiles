
A WordPress plugin that adds Team Member Profiles.

##Usage
1. Install and activate this plugin into a WordPress site.
2. Add team members by finding the Team members icon and clicking 'Add new Team Member'
3. View the team members archive page to see the team profiles.

##Dependancies
* [CMB2](https://github.com/WebDevStudios/CMB2) - this plugin uses CMB2 for it's metaboxes and sanitization. Please install and activate cmb2 before using this plugin.

####Sanitization, validation, and escaping
* By default, CMB2  passes entries in a field with the url type to esc_url. If no other validation is needed this is sufficent for sanitizing, and escaping urls.
* This plugin requires urls to be FaceBook urls, or Twitter urls so it passes these entries to a custom sanitization call back.
* URLS without http:// will be rejected.

##Recommended themes 
* Twenty Seventeen
* Twenty Sixteen
* Twenty Fifteen

##Alternative Display for team profiles.

If your theme's layout is too incompatible with the plugin. Then you can also completely override the archives template for Team Members. Just uncomment line 205 and comment line 203 in init.php.

comment this out:
```php
DB_add_content_filters();
```
un-comment this:
```php
add_filter( 'archive_template', 'DB_staff_page_template', 99 );
```
