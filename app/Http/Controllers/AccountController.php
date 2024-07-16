<?php

namespace App\Http\Controllers;

use App\Models\InvalidQuestions;
use App\Models\Questions;
use App\Models\User;
use App\Models\ValidQuestions;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        $all_user = User::all()->count();
        $all_questions = Questions::all()->count();
        $total_validated_questions = ValidQuestions::all()->count();
        $total_invalidated_questions = InvalidQuestions::all()->count();

        $total_questions_you_validated = ValidQuestions::where('validated_by', Auth::id())->count();
        $total_questions_you_invalidated = InvalidQuestions::where('invalidated_by', Auth::id())->count();
        $total_handled = $total_questions_you_validated + $total_questions_you_invalidated;


        return Inertia::render('Account/index', [
            "stats" => [
                "all_user" => $all_user,
                "all_questions" => $all_questions,
                "total_validated_questions" => $total_validated_questions,
                "total_invalidated_questions" => $total_invalidated_questions,
                "total_questions_you_validated" => $total_questions_you_validated,
                "total_questions_you_invalidated" => $total_questions_you_invalidated,
                "total_handled" => $total_handled,
            ]
        ]);
    }
}
