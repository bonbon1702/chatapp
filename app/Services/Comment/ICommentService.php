<?php

namespace Services\Comment;

interface ICommentService
{
	public function all();

	public function create(array $data);

	public function get($id);

	public function delete($id);
}
