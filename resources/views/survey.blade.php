<!DOCTYPE html>
<html>
<head>
<a href="/">⬅ Back to Dashboard</a>
<br><br>
    <title>{{ $survey->name }}</title>
</head>
<body>

<h2>{{ $survey->name }}</h2>

<form method="POST" action="/submit">
    @csrf

@foreach($questions as $index => $q)
    <div>
        <p><strong>Q{{ $index + 1 }}:</strong> {{ $q->question }}</p>

        @php
            $options = array_merge(
                [$q->correct_answer],
                json_decode($q->wrong_options, true)
            );

            $options = array_filter($options);
            $options = array_unique($options);
            $options = array_values($options);

            shuffle($options);
        @endphp

        @foreach($options as $option)
            <label>
                <input type="radio" name="answers[{{ $q->id }}]" value="{{ $option }}">
                {{ $option }}
            </label><br>
        @endforeach

        <br>
    </div>
@endforeach

<button type="submit">Submit</button>
</form>

</body>
</html>