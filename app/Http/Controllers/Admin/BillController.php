<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Bill_Detail;
use App\Http\Controllers\Controller;
use App\Repository\Bill\BillRepositoryInterface;
use App\Repository\User\UserEloquentRepository;
use App\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $userRepository;
    protected $billRepository;
    public function __construct(BillRepositoryInterface $billRepository, UserEloquentRepository $userRepository)
    {
        $this->billRepository = $billRepository;
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $bills = $this->billRepository->getAll();

        return view('Admin.Bill.home', [
            'bills' => $bills
        ]);
    }
    public function detail($id, $idUser)
    {
        $user = $this->userRepository->find($idUser);
        $billDetail = $this->billRepository->detail($id);
        $total = 0;
        foreach ($billDetail as $key)
        {
            $total += $key['quantity']*$key['unit_price'];
        }

        return view('Admin.Bill.detail',[
            'user' => $user,
            'billDetail' => $billDetail,
            'total' => $total
        ]);
    }
}

