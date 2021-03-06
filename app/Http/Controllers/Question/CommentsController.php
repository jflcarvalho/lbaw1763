<?php

namespace App\Http\Controllers\Question;

use App\Commentable;
use App\Message;
use App\MessageVersion;
use App\Comment;
use App\Answer;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;

class CommentsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Comments Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles getting all the comments regarding a message
    |
    */

    /**
     * @param $comment
     * @return array
     */
    private function getCommentJSON($comment)
    {
        $message = $comment->message;
        $content = $message->message_version;
        $author = $message->get_author();
        $positive = $message->getVote();
        $isMod = Auth::check() ? Auth::user()->isModerator() : false;
        $has_report = Auth::check() ? Auth::user()->hasReportOn($message->id) : false;

        return array(
            "id" => $comment->id,
            "author" => $author->username,
            "score" => $message->score,
            "was_edited" => $message->was_edited(),
            "is_owner" => ($author->id == Auth::id()),
            "is_mod" => $isMod,
            "discrete_p" => $positive === true ? '' : 'discrete',
            "discrete_n" => $positive === false ? '' : 'discrete',
            "discrete_r" => $has_report ? '' : 'discrete',
            'banned' => $message->is_banned ? 'banned' : '',
            "content" => array (
                "version" => $content->content,
                "creation_time" => $content->creation_time,
                "author" => ($content->moderator_id != null? $content->moderator_id : $content->author)
            )
        );
    }

    private function getComments(&$comment_ids) {
        $comments = array();

        foreach ($comment_ids as $comment)
            array_push($comments, $this->getCommentJSON($comment));

        $result = array("comments" => $comments, "is_authenticated" => Auth::check());
        return response()->json($result);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAnswerComments(Request $request)
    {
        $commentable = Answer::find($request->answer_id)->commentable;
        $comment_ids = $commentable->get_comments;

        return $this->getComments($comment_ids);
    }

    public function getQuestionComments(Request $request)
    {
        $commentable = Question::find($request->id)->commentable;
        $comment_ids = $commentable->get_comments;

        return $this->getComments($comment_ids);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addComment(Request $request)
    {
        if (!Auth::check())
            return response()->json(
                array("is_authenticated" => false)
            );

        // Placeholder for the id of the comment that is going to be created
        $comment_id = null;

        DB::transaction(function() use (&$request, &$comment_id) {
            $user_id = User::find(Auth::id())->id;
            $comment_id = Message::create(['author' => $user_id])->id;

            Comment::create(['id' => $comment_id, 'commentable_id' => $request->commentable]);
            MessageVersion::create(['content' => $request->input('content'), 'message_id' => $comment_id]);
        });

        return response()->json(
            array(
                "comment" => $this->getCommentJSON(Comment::find($comment_id)),
                "is_authenticated" => true
            )
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editComment(Request $request)
    {
        $comment = Comment::find($request->comment);
        $message = $comment->message;

        // Checking if the User can edit the comment
        $this->authorize('edit', $message);
        MessageController::editMessage($request, $message);

        return response()->json(
            array(
                "comment" => $this->getCommentJSON($comment),
                "is_authenticated" => true
            )
        );
    }

    public function deleteComment(Request $request)
    {
        $comment = Comment::find($request->comment);
        $message = $comment->message;

        // Checking if the User can delete the comment
        $this->authorize('delete', $message);
        $message->delete();
    }
}
