<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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

    public function make(Request $request)
    {
        if ($request->uuid == null) {
            $uuid = "GM-" . $this->substr5(random_int(100000000000, 999999999999), true, 10);
        } else {
            $uuid = $request->uuid;
        }
        try {
            $create_transaction = Transaction::create([
                'uuid' => $uuid,
                'user_id' => auth()->id(),
                'title'  => $request->title,
                'description' => $request->description,
                'amount' => $request->amount,
                'status' => $request->status,
            ]);
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true, 'transaction' => $create_transaction]);
    }
}
