<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::all();
        foreach ($orders as $row) {
            if($row->type=='money')
            { $type = 'Thanh toán sau';}
            else{
                $type = 'Thanh toán online';
            }
            $order[] = array(
                '0' => $row->id,
                '1' => $row->name,
                '2' => $row->address,
                '3' => $row->phone,
                '4' => $type,
                '5' => number_format($row->total). 'đ',
            );
        }

        return (collect($order));
    }
    public function headings(): array
    {
        return [
            'id',
            'Tên',
            'Địa chỉ',
            'Số điện thoại',
            'Thanh toán',
            'Tổng',
        ];
    }
}
