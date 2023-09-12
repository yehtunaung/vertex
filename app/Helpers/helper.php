<?php

namespace App\Helpers;

use App\Models\CreditRecord;
class helper {

    /**
     * get credit left total by customer list id
     * @param int $customer_list_id
     * @return int
     */
    public static function getTotalCreditLeft($customer_list_id): int
    {
        $credit = CreditRecord::where('customer_id', '=', $customer_list_id)->sum('credit_amount');
        return $credit;
    }
}