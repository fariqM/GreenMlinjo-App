<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Voucher;
use Illuminate\Http\Request;

class OrderController extends Controller
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

    public function makeOrder(Request $request)
    {
        // return response($request->all());
        $uuid = "GM-" . $this->substr5(random_int(100000000000, 999999999999), true, 10);

        try {
            $order = Order::create(array_merge($request->all(), [
                'uuid_key' => $uuid,
                'customer_id' => auth()->id(),
                'status' => 'Memproses pesanan anda',
                'driver_id' => auth()->id(),
            ]));
            // return response(['data' => $order]);

            foreach ($request->order_products as $key => $value) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $value['id'],
                    'qty' => $value['qty'],
                    'notes' => $value['notes'],
                ]);
            }
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }

        return response(['success' => true, 'order' => $order->id]);
    }

    public function prepareOrder(Request $request)
    {


        return response(['success' => true, 'req' => $request->all()]);
    }

    public function voucherIndex()
    {
        return response(['success' => true, 'data' => Voucher::all()]);
    }
}
