<?php
namespace App\Http\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package VirtualVetsPortal\Interfaces
 */
interface UserRepositoryInterface
{
    /**
     * @param string $date
     * @return mixed
     */
    public function getAllApis($date = '');

    /**
     * @return mixed
     */
    public function getAllUsers();

}
