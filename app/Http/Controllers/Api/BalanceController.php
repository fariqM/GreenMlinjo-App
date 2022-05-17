<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    function CSPRNG(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    function conv_md5($value)
    {
        return md5($value);
    }

    function substr5($value, $isUsedMD5 = false, $lenght = 5)
    {
        if ($isUsedMD5) {
            return substr($this->conv_md5($value), random_int(0, 25), $lenght);
        } else {
            $val_length = strlen($value);
            if ($val_length <= $lenght) {
                return substr($this->conv_md5($value), random_int(0, 25), $lenght);
            } else {
                return substr($value, random_int(1, $val_length - $lenght), $lenght);
            }
        }
    }

    public function getBalance()
    {
        return response(['success' => true, 'balance' => Balance::where('user_id', auth()->id())->firstOrFail(['balance'])]);
    }

    public function topup(Request $request)
    {
        $user_id = auth()->id();
        $balance = Balance::where('user_id', $user_id)->firstOrFail();
        $newBalance = $balance->balance + $request->balance;
        try {
            $balance->update([
                'balance' => $newBalance
            ]);

            Transaction::create([
                'uuid' => "MP-T-" . $this->substr5(random_int(100000000000, 999999999999), true, 10),
                'user_id' => $user_id,
                'title'  => 'MlijoPay-Topup',
                'description' => 'Topup saldo MlijoPay',
                'amount' => $request->balance,
                'status' => 2,
            ]);
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true, 'balance' => $newBalance]);
    }

    public function purchase(Request $request)
    {
        $balance = Balance::where('user_id', auth()->id())->firstOrFail();

        try {
            $balance->update([
                'balance' => $balance->balance - $request->amount
            ]);
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true]);
    }
}
