<?php
    namespace App\Http\Controllers;

    use App\Models\Deliver;
    use App\Models\Merchant;

    class DashboardController extends Controller
    {
        public function index()
        {
            $delivers = Deliver::all();
            $merchants = Merchant::all();
            return view('dashboard', compact('delivers', 'merchants'));
        }
    }
