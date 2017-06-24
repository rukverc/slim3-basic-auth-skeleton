{% extends 'includes/layout.php' %}

{% block content %}

	<section class="padding-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2>Slim 3 Basic Authentication Skeleton</h2>
					
					<hr>
					
					<p>This is a skeleton template for Slim 3, Twig, Bootstrap and Authentication Framework. The simplest boilerplate for getting started on a new Slim 3 adventure. No clutter, ready to transform into your next big idea and just to save a little time.</p>
					
					<p>Also used in <a href="https://www.iconic-publishing.com" target="_blank">Iconic Publishing</a> projects.</p>
					
					<hr>
					
					<h2>Installation</h2>
					
					<p>PHP Version 5.4 or above.</p>
					
					<p>Download <a href="https://getcomposer.org/" target="_blank">Composer</a></p>

					<p>Dependencies are located in: <code>composer.json</code></p>

					<p>Updating dependencies in your Terminal via composer: <code>cd [path/to/project]</code></p>
					
					<p>Run Globally:</p>
					
					<pre>composer require iconic-publishing/slim3-basic-authentication-skeleton</pre>

					<pre>composer update</pre>
					
					<p>Run Locally with PHP:</p>
					
					<pre>php composer.phar require iconic-publishing/slim3-basic-authentication-skeleton</pre>

					<pre>php composer.phar update</pre>
					
					<hr>
					
					<h2>Illuminate Database (Eloquent)</h2>
					
					<p>Test Database located in: <code>- Database/test.sql</code></p>
					
					<p>Database settings are located in: <code>config/dev.php</code></p>
					
					<hr>
					
					<h2>Press Example with Pagination</h2>
					
					<p>Press page use Illuminate Pagination (Press or Blogs).</code></p>
					
					<p>Pagination settings are located in: <code>config/dev.php</code> Default value: <code>3</code></p>
					
					<p>Ability to generate URL slugs: <code>app/Models/Filters.php</code></p>
					
					<p>Example usage within a <code>Controller</code>:</p>

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
					
					<h2>Mailgun</h2>
					
					<p>Open a Sandbox account with <a href="https://www.mailgun.com" target="_blank">Mailgun</a></p>
					
					<p>Mailgun API settings are located in: <code>config/dev.php</code></p>
					
					<p>Changing Mailgun to send either HTML or Plain Text email: <code>app/Models/MailgunEmail.php</code></p>
					
					<h2>Twilio SMS</h2>
					
					<p>Open a Sandbox account with <a href="https://www.twilio.com" target="_blank">Twilio</a></p>
					
					<p>Twilio API settings are located in: <code>config/dev.php</code></p>
					
					<h2>Settings</h2>
					
					<p>Respect Validation settings are located in: <code>app/Validation/Forms/ContactForm.php</code></p>
					
					<p>Middleware for Slim CSRF and Validation are located in: <code>app/Middleware/</code></p>
					
					<p>Custom 404 <code>notFoundHandler</code> are located in: <code>app/Handlers/NotFoundHandler.php</code></p>
				</div>
				
				<div class="col-md-4">
					<h2>Sample Pages</h2>
					
					<hr>
					
					<ul>
						<li><a href="{{ path_for('getPress') }}">View Sample Press Page</a></li>
						<li><a href="{{ path_for('contact') }}">View Sample Contact Page</a></li>
						<hr>
						<li><a href="{{ path_for('getRegister') }}">View Sample Register Page</a></li>
						<li><a href="{{ path_for('getLogin') }}">View Sample Login Page</a></li>
						<li><a href="{{ path_for('getRecoverPassword') }}">View Sample Recover Password</a></li>
					</ul>
					
					<h2>Features</h2>
					
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
						<li>Twilio API (SMS Notification)</li>
						<li>Nesbot Carbon</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

{% endblock %}