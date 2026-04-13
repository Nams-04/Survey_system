<!DOCTYPE html>
<html>
<head>
<a href="/">⬅ Back to Dashboard</a>
    <title>Admin Dashboard</title>
</head>
<body>
    

<h2>All Surveys</h2>

<ul>
@foreach($surveys as $survey)
    <li>
        {{ $survey->name }} 
        - <a href="/admin/results/{{ $survey->id }}">View Results</a>
    </li>
@endforeach
</ul>

</body>
</html>