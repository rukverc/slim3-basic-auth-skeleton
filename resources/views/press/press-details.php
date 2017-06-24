{% extends 'includes/layout.php' %}

{% block content %}

	<section class="padding-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p><a href="{{ path_for('getPress') }}">Back to Press</a></p>
				</div>
				
				<div class="col-md-8">
					<h2>Sample Press Page Details</h2>
					
					<hr>
					
					<h3>{{ pressMain.title }}</a></h3>
					
					<p><small>Posted: {{ pressMain.published_on | date('jS F, Y') }}</small></p>
					
					<hr>
					
					<p>{{ pressMain.description | nl2br }}</p>
				</div>
				
				{% include 'press/side-bar/side-bar-press.php' %}
			</div>
		</div>
	</section>

{% endblock %}