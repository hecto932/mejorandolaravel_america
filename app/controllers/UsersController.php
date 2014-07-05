<?php 

use HireMe\Entities\User;
use HireMe\Managers\RegisterManager;
use HireMe\Repositories\CandidateRepo;
use HireMe\Components\Field;

class UsersController extends BaseController {

	protected $candidateRepo;

	public function __construct(CandidateRepo $candidateRepo)
	{
		$this->candidateRepo = $candidateRepo;
	}

	public function signUp()
	{
			return View::make('users/sign-up');
	}

	public function register()
	{
		$user = $this->candidateRepo->newCandidate();
		$manager = new RegisterManager($user, Input::all());


		if($manager->save())
		{
			return Redirect::to('/');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());

		/* ANTES
		$data = Input::only(['full_name', 'email', 'password', 'password_confirmation']);

		$rules 	= [
			'full_name' 			=> 'required',
			'email'					=> 'required|email|unique:users,email',
			'password' 				=> 'required|confirmed',
			'password_confirmation'	=> 'required'
		]; 

		$validation = \Validator::make($data, $rules);

		if($validation->passes())
		{
			$user = new User($data);
			$user->type = 'candidate';
			$user->save();
			//User::create($data);
			return Redirect::to('/');
		}
		return Redirect::back()->withInput()->withErrors($validation->messages());
		*/
	}
}