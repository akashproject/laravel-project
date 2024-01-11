<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
// use Barryvdh\DomPDF\PDF;
use PDF;
use App\Mail\DonationInfo;
use Mail;

class DonationController extends Controller
{
    public function donateNow(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'country'=>'required',
        ]);
        try {
            $donation_amount = $request['donate_amount'] ?? $request['custom_amount'];

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $donation_amount = $request['donate_amount'] ?? $request['custom_amount'];

            $customer = Customer::create(array(
                'email' => $request['email'],
                'source'  => $request['stripeToken'],
                'name' => $request['card_holder_name']
            ));
            
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => round($donation_amount*100),
                'currency' => 'usd',
                "description" => "Payment for " .env('APP_NAME'). " Donation " .$request['card_holder_name'],
            ));

            if ($charge->status == 'succeeded') {

                $donation = new Donation;
                $donation->customer_id = $charge->customer;
                $donation->transaction_id = $charge->id;
                $donation->card_holder_name = $request['card_holder_name'];
                $donation->country = $request['country'];
                $donation->amount = $donation_amount;
                $donation->fullname = $request['fullname'];
                $donation->email = $request['email'];
                $result = $donation->save();

                if ($result) {

                    $data = [
                        'name' => $donation->card_holder_name,
                        'email' => $donation->email,
                        'amount' => $donation_amount,
                        'country' => $donation->country,
                    ];

                    try {
                        // Send email with PDF attachment
                        $pdf = PDF::loadView('mail.pdf-template', compact('data'));
                        Mail::to($data['email'])->send(new DonationInfo($data, $pdf));
                    }
                    catch (\Exception $e) {
                        $notify[] = ['warning', $e->getMessage()];
                        return redirect()->back()->withNotify($notify);
                    }
                    return redirect()->route('home')->with('success','Thank you for your donation');
                }
            }
            else{
                return redirect()->route('home')->with('error',"Donation processing failed");
            }
        }
        catch (\Stripe\Exception\CardException $e) {
            $notify[] = ['error', $e->getError()->message];
            // return redirect()->back()->with('error',$e->getError()->message);
            return redirect()->back()->withNotify($notify);
        }
    }
}
