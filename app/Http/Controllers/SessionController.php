<?php

namespace App\Http\Controllers;

use App\Models\InvalidQuestions;
use App\Models\Questions;
use App\Models\ValidQuestions;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function startSession(Request $request): \Inertia\Response
    {
        $question = Questions::inRandomOrder()->firstOrFail();

        return Inertia::render('Dashboard/StartSession', [
            'question' => $question
        ]);
    }

    public function stopSession(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('dashboard');
    }

    public function SetValid(Request $request)
    {
        $user = auth()->user()->id;
        $question = Questions::find($request->question_id);

        $val_question = new ValidQuestions();
        $val_question->question = $question->question;
        $val_question->answer = $question->answer;
        $val_question->choice_1 = $question->choice_1;
        $val_question->choice_2 = $question->choice_2;
        $val_question->choice_3 = $question->choice_3;
        $val_question->choice_4 = $question->choice_4;
        $val_question->category = $question->category;
        $val_question->validated_by = $user;

        $val_question->save();

        $question->delete();

        return redirect()->route('startSession');
    }

    public function SetInvalid(Request $request)
    {
        $user = auth()->user()->id;
        $question = Questions::find($request->question_id);

        $val_question = new InvalidQuestions();
        $val_question->question = $question->question;
        $val_question->answer = $question->answer;
        $val_question->choice_1 = $question->choice_1;
        $val_question->choice_2 = $question->choice_2;
        $val_question->choice_3 = $question->choice_3;
        $val_question->choice_4 = $question->choice_4;
        $val_question->category = $question->category;
        $val_question->invalidated_by = $user;
        $val_question->stats = json_encode($request->all());

        $val_question->save();

        $question->delete();

        return redirect()->route('startSession');


    }
}
