<?php

namespace Repositories\Comment;

interface ICommentRepository
{
	public function all();

	public function create(array $data);

	public function get($id);

	public function delete($id);
}
