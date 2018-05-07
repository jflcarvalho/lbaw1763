<?php

namespace App\Http\Controllers\Question;

use App\Commentable;
use App\Message;
use App\MessageVersion;
use App\Comment;
use App\Answer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AnswersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Answers Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles getting all the answers regarding a question
    |
    */

    /**
     * @param $comment
     * @return array
     */
    private function getAnswerJSON($answer)
    {
        $message = $answer->message;
        $content = $message->message_version;
        $author = $message->get_author();

        return array(
            "id" => $answer->id,
            "author" => $author->username,
            "score" => $message->score,
            "was_edited" => $message->was_edited(),
            "is_owner" => ($author->id == Auth::id()),
            "content" => array (
                "version" => $content->content,
                "creation_time" => $content->creation_time,
                "author" => ($content->moderator_id != null? $content->moderator_id : $content->author)
            )
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAnswer(Request $request)
    {
        if (!Auth::check())
            return response()->json(
                array("is_authenticated" => false)
            );

        // Placeholder for future variables
        $answer_id = null;
        $answer = null;

        DB::transaction(function() use (&$request, &$answer_id, &$answer) {
            $user_id = User::find(Auth::id())->id;
            $answer_id = Message::create(['author' => $user_id])->id;
            
            Commentable::create(['id' => $answer_id]);
            $answer = Answer::create(['id' => $answer_id, 'question_id' => $request->question]);
            MessageVersion::create(['content' => $request->input('content'), 'message_id' => $answer_id]);
        });

        return response()->json(
            array(
                "answer" => $this->getAnswerJSON($answer),
                "is_authenticated" => true
            )
        );
    }
}
