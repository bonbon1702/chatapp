<?php
namespace Repositories\User;

interface IUserRepository
{
	public function all();

	public function create(array $data);

	public function get($email);

	public function getLogin();
}