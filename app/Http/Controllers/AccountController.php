<?php

namespace App\Http\Controllers;

use App\Models\InvalidQuestions;
use App\Models\Questions;
use App\Models\User;
use App\Models\ValidQuestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        $all_user = User::all()->count();
        $all_questions = DB::select('SELECT COUNT(*) AS count FROM questions')[0]->count;
        $total_validated_questions = DB::select('SELECT COUNT(*) AS count FROM valid_questions')[0]->count;;
        $total_invalidated_questions = DB::select('SELECT COUNT(*) AS count FROM invalid_questions')[0]->count;

        $total_questions_you_validated = DB::select('SELECT COUNT(*) AS count FROM valid_questions WHERE validated_by = ?', [Auth::id()])[0]->count;
        $total_questions_you_invalidated = DB::select('SELECT COUNT(*) AS count FROM invalid_questions WHERE invalidated_by = ?', [Auth::id()])[0]->count;
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
