<?php

namespace App\Http\Controllers;

use App\Models\InvalidQuestions;
use App\Models\Questions;
use App\Models\ValidQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        dd("done");
        $user = Auth::user();

        if ($user == null) {
            return redirect('/login');
        } else {
            if ($user->id != 1) {
                return redirect('/home');
            }
        }

        $invalidated_questions = InvalidQuestions::take(100)->get();

        $all_questions = [];

        foreach ($invalidated_questions as $question) {
            $stats = json_decode($question->stats);
            $valid_choices = null;

            if ($stats->invalid_choices) {
                $valid_choices = $this->valid_ans($stats);
            } else if ($stats->remark != null && (explode(",\n", rtrim($stats->remark, ',')) >= 3)) {
                $valid_choices = $this->valid_ans($stats);
            }

            if ($valid_choices) {
                $choices = explode(",\n", rtrim($stats->remark, ','));
                $question->choices = $choices;

                array_push($all_questions, $question);
            }

        }

        return Inertia::render('Admin/index', [
            'questions' => $all_questions,
        ]);
    }

    public function valid_ans($stats)
    {
        $choices = explode(",\n", rtrim($stats->remark, ','));

        return count($choices) >= 3;
    }


    public function accept(Request $request)
    {
        $question = InvalidQuestions::find($request->question['id']);

        $altered_question = new ValidQuestions();

        $altered_question->question = $question->question;
        $altered_question->answer = $question->answer;
        $altered_question->choice_1 = $request->question['answer'];
        $altered_question->choice_2 = $request->question['choices'][0];
        $altered_question->choice_3 = $request->question['choices'][1];
        $altered_question->choice_4 = $request->question['choices'][2];
        $altered_question->validated_by = $question->invalidated_by;
        $altered_question->passed = Auth::user()->id;
        $altered_question->category = $question->category;

        $altered_question->save();
        $question->delete();

        return redirect()->back()->with('flash','success');
    }

    public function reject(Request $request)
    {
        $question = InvalidQuestions::find($request->question['id']);

        $altered_question = new Questions();

        $altered_question->question = $question->question;
        $altered_question->answer = $question->answer;
        $altered_question->choice_1 = $request->question['answer'];
        $altered_question->choice_2 = $request->question['choices'][0];
        $altered_question->choice_3 = $request->question['choices'][1];
        $altered_question->choice_4 = $request->question['choices'][2];
        $altered_question->category = $question->category;

        $altered_question->save();
        $question->delete();

        return redirect()->back()->with('flash','success');
    }
}
