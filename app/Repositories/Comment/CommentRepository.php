<?php
namespace Repositories\Comment;

use models\Comment as Comment;
use \Sentry as Sentry;

class CommentRepository implements ICommentRepository
{
	public $comment;
	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	public function all()
	{
		$comments = $this->comment->all();

		return $comments;
	}

	public function create(array $data)
	{
		$user = Sentry::getUser();

		$this->comment->user_id = $user->id;
		$this->comment->content = $data['content'];

		$this->comment->save();
	}

	public function get($id)
	{
		$comment = $this->comment->where('id', '=', $id)->get();

		return $comment;
	}

	public function delete($id)
	{
		$this->comment->where('id', '=', $id)->delete();
	}
}