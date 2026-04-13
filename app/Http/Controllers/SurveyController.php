<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class SurveyController extends Controller
{

public function store(Request $request)
{
    $request->validate([
        'survey_name' => 'required',
        'csv' => 'required|file|mimes:csv,txt'
    ]);

    // Create survey
    $survey = Survey::create([
        'name' => $request->survey_name,
        'slug' => Str::slug($request->survey_name . '-' . time())
    ]);

    $file = $request->file('csv');

    if (($handle = fopen($file, 'r')) !== false) {

        while (($row = fgetcsv($handle, 1000, ",")) !== false) {

            Question::create([
                'survey_id' => $survey->id,
                'question' => $row[0],
                'correct_answer' => $row[1],
                'wrong_options' => json_encode(array_slice($row, 2))
            ]);
        }

        fclose($handle);
    }

    return "Survey Created Successfully!";
}

public function show($slug)
{
    $survey = Survey::where('slug', $slug)->firstOrFail();

    $questions = Question::where('survey_id', $survey->id)->get();

    return view('survey', compact('survey', 'questions'));
}

public function submit(Request $request)
{
    $answers = $request->input('answers');

    // Get survey from first question
    $firstQuestionId = array_key_first($answers);
    $question = Question::find($firstQuestionId);

    $survey_id = $question->survey_id;

    Response::create([
        'survey_id' => $survey_id,
        'answers' => json_encode($answers)
    ]);

    return "Responses submitted successfully!";
}

public function admin()
{
    $surveys = Survey::all();

    return view('admin', compact('surveys'));
}

public function results($id)
{
    $survey = Survey::findOrFail($id);
    $responses = Response::where('survey_id', $id)->get();

    return view('results', compact('survey', 'responses'));
}

public function download($id)
{
    $responses = Response::where('survey_id', $id)->get();

    $filename = "results.csv";
    $handle = fopen($filename, 'w');

    foreach ($responses as $response) {
        fputcsv($handle, json_decode($response->answers, true));
    }

    fclose($handle);

    return response()->download($filename)->deleteFileAfterSend(true);
}

public function dashboard()
{
    $surveys = Survey::all();
    return view('dashboard', compact('surveys'));
}

public function toggle($id)
{
    $survey = Survey::findOrFail($id);

    $survey->is_active = !$survey->is_active;
    $survey->save();

    return redirect('/admin');
}

}
