<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationListController extends Controller
{

    public function index()
    {
        $donners = Donation::get();

        return view('backend.donation-list',compact('donners'));
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        $notify[] = ['success',  __('admin_messages.deleted')];
        return redirect()->back()->withNotify($notify);
    }

}
