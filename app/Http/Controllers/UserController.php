<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\User;
use DB;

class UserController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
	{
		$users = $this->userModel->All();
		
		return view('user.index', compact('users'));
	}
    public function update(Requests\UserRequest $request, $id)
    {
        $is_admin = $request->get("is_admin");
		$this->userModel->find($id)->update($request->all());

        return redirect()->route('user.index');
    }
}
