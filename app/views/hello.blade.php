<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>STI Demo</title>
	{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') }}
</head>
<body>
	<div class="container">
		<h2>All fields</h2>
		@foreach ($allFormFields as $formField)
			{{ $formField->markup }}
		@endforeach
		<hr>

		<h2>Text fields</h2>
		@foreach ($textFields as $formField)
			{{ $formField->markup }}
		@endforeach
	</div>
</body>
</html>
