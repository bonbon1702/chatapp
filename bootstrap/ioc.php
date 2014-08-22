<?php
//user bind
App::bind('Repositories\User\IUserRepository', 'Repositories\User\UserRepository');
App::bind('Services\User\IUserService', 'Services\User\UserService');

//comment bind
App::bind('Services\Comment\ICommentService', 'Services\Comment\CommentService');
App::bind('Repositories\Comment\ICommentRepository', 'Repositories\Comment\CommentRepository');