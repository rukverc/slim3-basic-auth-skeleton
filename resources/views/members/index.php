{% extends 'includes/layout.php' %}

{% block content %}

	<section class="padding-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p><a href="{{ path_for('logout') }}">Logout</a></p>
				</div>
				
				<div class="col-md-8">
					<h2>Memebrs Area</h2>
					
					<p>Hi {{ token.getFirstNameOrUsername() }}, you are now signed in.</p>
				</div>
			</div>
		</div>
	</section>
	
{% endblock %}