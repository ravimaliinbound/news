<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\PaymentLog;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($inquiryId)
    {
        $inquiry = PaymentLog::where('inquiry_id', base64_decode($inquiryId))->orderBy('id', 'desc')->get();

        return view('admin.payment.list', compact('inquiry', 'inquiryId'));
    }

    public function create($inquiryId)
    {
        return view('admin.payment.add', compact('inquiryId'));
    }

    public function store(Request $request)
    {
        $inquiry = new PaymentLog();
        $inquiry->inquiry_id = $request->inquiry_id;
        $inquiry->date = $request->date;
        $inquiry->amount = $request->amount;
        $inquiry->tds = $request->tds;
        $inquiry->ref_number = $request->ref_number;
        $inquiry->mode = $request->mode;
        $inquiry->remarks = $request->remark;
        $inquiry->save();

        $amount = $request->amount + $request->tds;

        Inquiry::where('id', $request->inquiry_id)
            ->incrementEach([
                'received_amount' => $amount,
                'tds' => $request->tds,
            ]);

        return redirect(route('admin.payment.index', base64_encode($request->inquiry_id)))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Payment',
                'message' => 'Payment successfully added',
            ],
        ]);
    }

    public function edit($id)
    {
        $detail = PaymentLog::where('id', base64_decode($id))->first();

        return view('admin.payment.edit', compact('detail'));
    }

    public function update(Request $request)
    {
        $this->updateAmount($request->id);

        $inquiry = PaymentLog::findOrFail($request->id);
        $inquiry->inquiry_id = $request->inquiry_id;
        $inquiry->date = $request->date;
        $inquiry->amount = $request->amount;
        $inquiry->tds = $request->tds;
        $inquiry->ref_number = $request->ref_number;
        $inquiry->mode = $request->mode;
        $inquiry->remarks = $request->remark;
        $inquiry->save();

        $amount = $request->amount + $request->tds;

        Inquiry::where('id', $request->inquiry_id)
            ->incrementEach([
                'received_amount' => $amount,
                'tds' => $request->tds,
            ]);

        return redirect(route('admin.payment.index', base64_encode($request->inquiry_id)))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Payment',
                'message' => 'Payment successfully updated',
            ],
        ]);
    }

    public function delete($id)
    {
        try {
            $paymentLog = PaymentLog::where('id', base64_decode($id))->first();

            if (! is_null($paymentLog)) {
                $amount = $paymentLog->amount + $paymentLog->tds;

                $deleteInvestor = PaymentLog::where('id', base64_decode($id))->delete();

                Inquiry::where('id', $paymentLog->inquiry_id)->decrementEach(['received_amount' => $amount, 'tds' => $paymentLog->tds]);
            }
        } catch (Exception $e) {
            \Log::info($e);
        }

        return redirect()->back()->with('messages', [
            [
                'type' => 'success',
                'title' => 'Payment',
                'message' => 'Payment entry successfully deletey',
            ],
        ]);
    }

    public function updateAmount($id)
    {
        $paymentLog = PaymentLog::where('id', $id)->first();

        if (! is_null($paymentLog)) {
            $amount = $paymentLog->amount + $paymentLog->tds;
            Inquiry::where('id', $paymentLog->inquiry_id)
                ->decrementEach([
                    'received_amount' => $amount,
                    'tds' => $paymentLog->tds,
                ]);
        }
    }
}
