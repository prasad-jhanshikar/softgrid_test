<?php
namespace App\Http\Repositories;

use Auth;
use DB;
use Exception;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\ApiHit;
use Illuminate\Support\Facades\Log;

/**
 * Class UserRepository
 * @package App\Http\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $userModel;
    /**
     * @var ApiHit
     */
    private $apiHitModel;
    /**
     *
     */
    public function __construct()
    {
        $this->userModel = new User();
        $this->apiHitModel = new ApiHit();
    }

    /**
     * @param string $date
     * @return mixed
     */
    public function getAllApis($date = '')
    {
        $apis = $this->apiHitModel;
        if (!empty($date) && $date != null) {
            $apis = $apis->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $date);
        }

        return $apis->count();
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return $this->userModel->all();
    }
}
