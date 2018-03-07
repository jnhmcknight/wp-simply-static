# Simply Static

Contributors: codeofconduct
Donate link: http://simplystatic.co/
Tags: html, static website generator, static site, secure, fast
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 2.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a static copy of your WordPress site that you can serve on your favorite web server.

## Description

Simply Static is a static site generator for WordPress that helps you create a static site that you can serve separately from your WordPress installation. This provides a couple benefits. One, this allows you to keep WordPress in a secure location that no one can access but you. Two, your static site is going to be really, _really_ fast.

### Security

WordPress is used by [one in four websites](http://venturebeat.com/2015/11/08/wordpress-now-powers-25-of-the-web/). That makes it a prime target for hackers. There are a lot of ways that your site can be compromised, but two-thirds of all hacks are caused by [vulnerabilities in WordPress plugins, themes, and core files](https://www.wordfence.com/blog/2016/03/attackers-gain-access-wordpress-sites/).

Keeping WordPress secure requires constant vigilance. Exploits are being found for WordPress themes and plugins every day. Even WordPress itself has critical vulnerabilities from time to time. If you don’t stay on top of updates, your site *will* get hacked. It’s just a matter of when.

But what if there was an easy way to keep WordPress secure? What if you could lock WordPress away somewhere where no one can get to it but you?

With Simply Static you can put your WordPress installation in a secure location and publish a static site for the rest of the world to see. You can keep WordPress at a secret URL, protect it with .htaccess, or even put it behind a VPN. Simply Static will create static copies of all of the pages from your WordPress installation and replace the URLs to match where you’ll be hosting it.

### Performance

Every time you visit a WordPress page it needs to perform database queries to fetch content and run PHP code to render the page. These actions take time to perform.

With Simply Static, you’re creating a static copy of all of your WordPress pages. That time to create each page is incurred once, when Simply Static runs. When someone visits your static site they can instantly receive the page because Simply Static already did the work of creating it.

Depending on the complexity of your site, theme, and plugins, using a static site can easily increase the performance of your site by 10x.

### Other Similar Plugins

In the event that Simply Static doesn't meet your needs, give this plugin a try:

- [WP Static HTML Output](https://wordpress.org/plugins/static-html-output-plugin/)

It's updated regularly and the author is responsive to support requests.

## Installation

1. Log into your WordPress website.
2. On the left menu, hover over Plugins and then click on Add New.
3. In the Search Plugins box, type in "Simply Static" and press the Enter key.
4. You will see a list of search results which should include the Simply Static plugin. Click on the Install Now button to install the plugin.
5. After installing the plugin you will be prompted to activate it. Click on the Activate Plugin link.
6. The Simply Static plugin is now installed and can be found on the left menu.

or

1. Upload the entire `simply-static` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Frequently Asked Questions

### What does Simply Static do?

Simply Static generates static (HTML) copies of your WordPress pages. It works a bit like a web crawler, starting at the main page of your website and looking for links to other pages to create static copies of. It also includes any images, CSS & JS files, and any other files that it can find a link to.

As Simply Static is creating the static pages, it will automatically replace the URLs for the WordPress installation with either (a) absolute URLs, at a domain of your choice or (b) relative URLs, so you can host the static files on any domain or (c) URLs constructed for offline use, so you can browse the site locally on your own computer.

### Who should use Simply Static?

Simply Static is great for sites with no user interactivity, such as blogs (with comments disabled) or brochure-ware sites for small businesses (with no forms).

### Are there any limitations?

Yes. Simply Static is only able to create a static copy of an *entire* site. It cannot selectively create static copies of specific pages, such as recently added posts. This means that if you have a site with 20,000 posts, and you add a new post, Simply Static will create a static copy of all 20,001 posts. This, combined with the fact that the plugin doesn't provide any kind of progress notification, means that Simply Static will provide a less-than-optimal experience for very large WordPress sites. We do plan to support very large sites eventually.

### How do I set up Simply Static?

Let's assume you presently have WordPress hosting a site at www.example.com, and that's where you'd like to have your static site instead. Your first task is going to be to move your WordPress installation to a subdomain, such as wordpress.example.com. Once that is complete, you'll set up www.example.com to receive your static files.

If www.example.com is on the same server as your WordPress installation, you can have Simply Static copy the static files to the directory that www.example.com is serving files from. If www.example.com is on a different server, you can download a zip of your static files and then upload them to www.example.com.

### Will this plugin interfere with other plugins?

No, Simply Static will not interfere with other plugins. In fact, Simply Static works well alongside other plugins, such as plugins to improve your site's SEO.

Simply Static creates a static copy of your website, which is just a collection of files: HTML, CSS, JS, images, etc. Any functionality that requires PHP code will not work with that static copy. That includes, but is not limited to: blog post comments, contact forms, forums, membership areas, and eCommerce.

Note that you can achieve much of this functionality by using plugins that interact with third-party services. For example, for blog post comments you could use [Disqus](https://wordpress.org/plugins/disqus-comment-system/) and for forms you could use [Wufoo](https://wordpress.org/plugins/wufoo-shortcode/).

### How is Simply Static different from cache plugins?

Cache plugins -- such as W3 Total Cache or WP Super Cache -- make your existing WordPress site faster by caching pages as they're visited. This makes your site much faster, but still leaves your WordPress installation accessible to the outside world. Unless you keep on top of updates, your WordPress installation can become vulnerable to hackers due to security vulnerabilities that are found over time.

Simply Static creates a static copy of your WordPress site that is intended to be used completely separately from your WordPress installation. Your WordPress installation lives on one server and your static site is served on a different server. Or, they're both on the same server, but your WordPress installation is restricted to only allow access from certain ip addresses or with an additional username/password requirement. Your static site is just a collection of static files with no server-side code or database -- nothing for hackers to hack -- while your WordPress installation remains safe and secure.

### Does Simply Static work on Windows hosts? What about WAMP?

No. We haven't done any testing on Windows and, based on user feedback, it seems like it is not working on Windows presently.

## Screenshots

1. This is what the Simply Static Generate page looks like after you've generated your static files. While Simply Static is running, you can view it's progress in the Activity Log. Once Simply Static has finished running, we'll show you exactly which files we made a static copy of in the Export Log.
2. The Simply Static General Settings page. With the Destination URLs option you can select how you want URLs to show up on your static site. And for the Delivery Method you have the choice of creating a ZIP archive or saving the files to a directory on the server.
3. On the Include/Exclude page, you can select additional URLs, files, or directories to include in your static site. And you can also choose URLs (or URL patterns) to exclude from your static site.
