<!DOCTYPE html>
<html>
<head>
<a href="/dashboard">⬅ Back to Dashboard</a>
<br><br>
    <title>Results</title>
</head>
<body>

<h2>Results for {{ $survey->name }}</h2>

@foreach($responses as $response)
    <pre>{{ $response->answers }}</pre>
@endforeach

<br>

<a href="/admin/download/{{ $survey->id }}">Download CSV</a>

</body>
</html>