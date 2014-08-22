<?php

use Services\Comment\ICommentService as ICommentService;
use Repositories\Comment\ICommentRepository as ICommentRepository;

class CommentController extends \BaseController {

	protected $commentService;
	protected $commentRepository;

	public function __construct(ICommentRepository $commentRepository, ICommentService $commentService)
	{
		$this->commentRepository = $commentRepository;
		$this->commentService    = $commentService;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return Response::json($this->commentService->all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$data = array(
			'content' => Input::get('text')
		);
		$this->commentService->create($data);

		return Response::json(array('success' => true));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$this->commentService->delete($id);

		return Response::json(array('success' => true));
	}


}
