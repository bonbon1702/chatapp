<?php
namespace Services\User;

interface IUserService
{
	public function all();

	public function create(array $data);

	public function get($email);

	public function getLogin();
}