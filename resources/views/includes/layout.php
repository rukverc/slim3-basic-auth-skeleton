<!doctype html>
<html lang="{{ config.lang.locale }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config.meta.title }}</title>
<meta name="description" content="{{ config.meta.description }}">
<meta name="robots" content="{{ config.meta.robots }}">
<link rel="stylesheet" href="{{ base_url() }}/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ base_url() }}/assets/css/custom.css">
</head>

<body oncontextmenu="{{ config.body.onContextMenu }}">
	
	{% block content %}{% endblock %}
	
	<script src="{{ base_url() }}/assets/js/bootstrap.min.js"></script>
	<script src="{{ base_url() }}/assets/js/custom.js"></script>
</body>
</html>