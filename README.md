=== Podcast Publisher Pro ===
Contributors: aymentucker
Donate link: https://designercastle.com/donate
Tags: podcast, podcasts, podcasting, rss, audio, custom post type, rest api
Requires at least: 5.0
Tested up to: 6.3
Stable tag: 1.0.0
Requires PHP: 7.2
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simplify podcast management with custom post types, meta fields, and REST API integration.

== Description ==

**Podcast Publisher Pro** is a powerful and user-friendly WordPress plugin designed to streamline podcast management. Whether you’re a casual podcaster or managing a professional podcasting network, this plugin simplifies the process by providing custom post types, custom meta fields for podcast-specific data, and REST API access to your podcast library.

### Features:

- **Custom Post Type for Podcasts:** Manage your podcasts separately from regular posts and pages.
- **Custom Meta Fields:** Add dedicated RSS feed URLs and audio file URLs for each podcast.
- **Featured Images:** Upload podcast cover art with featured images to enhance your listings.
- **REST API Integration:** Effortlessly access and manage podcast data through the WordPress REST API for external applications.
- **Custom Admin Columns:** View key podcast information (RSS feed, audio URL) directly in the admin table for improved content management.

### Usage:

1. Install and activate the plugin.
2. Navigate to **Podcasts > Add New** to create a new podcast post.
3. Enter the podcast title, content, RSS feed URL, audio URL, and upload a featured image (cover art).
4. Publish your podcast and make it available to your audience.

### Support:

For support and assistance, visit our [support forum](https://wordpress.org/support/plugin/podcast-publisher-pro/).

== Installation ==

1. Upload the `podcast-publisher-pro` folder to the `/wp-content/plugins/` directory of your WordPress installation.
2. Activate the plugin from the 'Plugins' menu within WordPress.
3. Navigate to **Podcasts** in your WordPress dashboard to start managing your podcasts.

== Frequently Asked Questions ==

= Can I use this plugin with any theme? =

Yes, **Podcast Publisher Pro** is designed to be compatible with any WordPress theme. No special configuration is needed.

= How do I access podcasts through the REST API? =

Your podcasts are available via the WordPress REST API. Access them at: `your-site.com/wp-json/wp/v2/podcast`.

= Is it possible to add custom fields or extend this plugin? =

Yes, you can use hooks and filters provided by WordPress to extend functionality. For example, you can use `register_meta` to add more custom fields.

== Screenshots ==

1. Podcast custom post type added to the WordPress admin menu.
2. Add New Podcast screen with meta fields for RSS feed and audio URL.
3. Podcast list screen with custom columns for RSS feed and audio URL.

== Changelog ==

= 1.0.0 =
* Initial release of Podcast Publisher Pro.

== Upgrade Notice ==

= 1.0.0 =
First version of Podcast Publisher Pro plugin. Includes all core features for managing podcasts.

== License ==

This plugin is licensed under the GPL-2.0+ license. For more information, please visit the [GPLv2 License page](https://www.gnu.org/licenses/gpl-2.0.html).
