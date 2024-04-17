<?php

namespace App\Http\Controllers;

use App\Helpers\EduNeraHelper;
use App\Helpers\PaymentHelper;
use App\Helpers\UnsubscribeHelper;
use App\Http\Controllers\Controller;
use App\Mail\EduNeraAccountSendMail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if ($request->email && $request->modal == 'unsubscribe') {
            UnsubscribeHelper::store($request->email);
        }

        if ($request->payment_id) {
            $payment = Payment::find($request->payment_id);

            if ($payment) {
                $payment = PaymentHelper::checkStatus($payment);

                if ($payment->status_id === 2) {
                    $user = User::where([
                        ['id', $payment->user_id],
                        ['is_account_send', 0]
                    ])->first();

                    if ($user) {
                        $accountData = EduNeraHelper::ExternalSaleStore([
                            'name' => $user->name,
                            'email' => $user->email,
                            'phone' => $user->phone,
                            'telegram' => $user->telegram,
                        ]);

                        if (isset($accountData->password)) {
                            try {
                                Mail::to([
                                    ['email' => $accountData->email]
                                ])->send(new EduNeraAccountSendMail($user, $accountData));
                            } catch (\Exception $e) {
                                Log::info('Не отправилось письмо с лк: ' . $accountData->email . ', ' . $user->id . ', ' . $e->getMessage());
                            }

                            $user->is_account_send = 1;
                            $user->save();
                        } else {
                            Log::info('Не создался лк: ' . json_encode($accountData));
                        }
                    }
                }
            }
        }

        return view('index');
    }
}
