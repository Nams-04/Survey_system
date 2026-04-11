<!DOCTYPE html>
<html>
<head>
<a href="/dashboard">⬅ Back to Dashboard</a>
    <title>Upload CSV</title>
</head>
<body>
    


<h2>Upload Survey CSV</h2>

<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Survey Name:</label><br>
    <input type="text" name="survey_name" required>
    <br><br>

    <label>Select CSV File:</label><br>
    <input type="file" name="csv" accept=".csv" required>
    <br><br>

    <input type="submit" value="Generate Questionnaire">

</form>

</body>
</html>