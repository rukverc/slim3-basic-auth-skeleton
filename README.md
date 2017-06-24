# Slim 3 Basic Eloquent Skeleton
This is a skeleton template for Slim 3, Twig, Bootstrap and Eloquent Framework. The simplest boilerplate for getting started on a new Slim 3 adventure. No clutter, ready to transform into your next big idea and just to save a little time.

Also used in <a href="https://www.iconic-publishing.com" target="_blank">Iconic Publishing</a> projects.

# Installation

Download <a href="https://getcomposer.org/">Composer</a>

Dependencies are located in: <code>composer.json</code>

Updating dependencies in your Terminal via composer: <code>cd [path/to/project]</code>

Run: <code>composer require iconic-publishing/slim3-basic-eloquent-skeleton</code>

Run: <code>composer update</code>

Run with PHP: <code>php composer.phar require iconic-publishing/slim3-basic-eloquent-skeleton</code>

Run with PHP: <code>php composer.phar update</code>

# Illuminate Database (Eloquent)
					
Test Database located in: <code>- Database/test.sql</code>
					
Database settings are located in: <code>config/dev.php</code>

# Press Example with Pagination
					
Press page uses Illuminate Pagination (Press or Blogs).</code>
					
Pagination settings are located in: <code>config/dev.php</code></code>
					
Ability to generate URL slugs: <code>app/Models/Filters.php</code>

<pre>
    public function addNewPress(Request $request, Response $response) {
	Press::create([
		'slug' => Filters::generateSlug($request->getParam('title')),
		'title' => $request->getParam('title'),
		'description' => $request->getParam('description'),
		'published_on' => $request->getParam('published_on')
	]);
    }
</pre>

# Settings

Contact page uses Mailgun API to send mail.

Mailgun API settings are located in: <code>config/dev.php</code>

Changing Mailgun to send either HTML or Plain Text email: <code>app/Models/MailgunEmail.php</code>

Respect Validation settings are located in: <code>app/Validation/Forms/ContactForm.php</code>

Middleware for Slim CSRF and Validation are located in: <code>app/Middleware/</code>

Custom 404 <code>notFoundHandler</code> are located in: <code>app/Handlers/NotFoundHandler.php</code>

# Features

<ul>
<li>PSR-4 Autoloading</li>
<li>Bootstrap v3.3.7</li>
<li>Symfony Var-Dumper</li>
<li>Hassankhan Config</li>
<li>Slim 3 Framework</li>
<li>Illuminate Database (Eloquent)</li>
<li>Illuminate Pagination (Press or Blogs)</li>
<li>Twig Views</li>
<li>Middleware</li>
<li>Slim Flash Messages</li>
<li>Slim CSRF</li>
<li>Respect Validation</li>
<li>Mailgun API</li>
</ul>
