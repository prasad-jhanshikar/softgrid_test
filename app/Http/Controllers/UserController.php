<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Http\Interfaces\UserRepositoryInterface;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepoInterface;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepositoryInterface
     */
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepoInterface = $userRepositoryInterface;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $param = !empty($request->all()) ? $request->only('filter_date') : '';
        $filterDate = !empty($param) ? $param['filter_date'] : '';
        $apiHits = $this->userRepoInterface->getAllApis($filterDate);
        $users = $this->userRepoInterface->getAllUsers();
        return view('users.dashboard', compact('apiHits', 'users', 'filterDate'));
    }
}
