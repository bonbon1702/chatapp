<?php
namespace models;

class Comment extends \Eloquent {
	
	protected $table = 'comment';

	protected $fillable = array('content'); 
}