<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'item_create',
            ],
            [
                'id'    => 20,
                'title' => 'item_edit',
            ],
            [
                'id'    => 21,
                'title' => 'item_show',
            ],
            [
                'id'    => 22,
                'title' => 'item_delete',
            ],
            [
                'id'    => 23,
                'title' => 'item_access',
            ],
            [
                'id'    => 24,
                'title' => 'customer_list_create',
            ],
            [
                'id'    => 25,
                'title' => 'customer_list_edit',
            ],
            [
                'id'    => 26,
                'title' => 'customer_list_show',
            ],
            [
                'id'    => 27,
                'title' => 'customer_list_delete',
            ],
            [
                'id'    => 28,
                'title' => 'customer_list_access',
            ],
            [
                'id'    => 29,
                'title' => 'feedback_create',
            ],
            [
                'id'    => 30,
                'title' => 'feedback_edit',
            ],
            [
                'id'    => 31,
                'title' => 'feedback_show',
            ],
            [
                'id'    => 32,
                'title' => 'feedback_delete',
            ],
            [
                'id'    => 33,
                'title' => 'feedback_access',
            ],
            [
                'id'    => 34,
                'title' => 'service_assign_create',
            ],
            [
                'id'    => 35,
                'title' => 'service_assign_edit',
            ],
            [
                'id'    => 36,
                'title' => 'service_assign_show',
            ],
            [
                'id'    => 37,
                'title' => 'service_assign_delete',
            ],
            [
                'id'    => 38,
                'title' => 'service_assign_access',
            ],
            [
                'id'    => 39,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 40,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 41,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 42,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 43,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 44,
                'title' => 'brand_create',
            ],
            [
                'id'    => 45,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 46,
                'title' => 'brand_show',
            ],
            [
                'id'    => 47,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 48,
                'title' => 'brand_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 50,
                'title' => 'service_assign_suspend',
            ],
            [
                'id'    => 51,
                'title' => 'service_assign_complete',
            ],
            [
                'id'    => 52,
                'title' => 'follow_up_access',
            ],
            [
                'id'    => 53,
                'title' => 'check_follow_up_list',
            ],
            [
                'id'    => 54,
                'title' => 'product_create',
            ],
            [
                'id'    => 55,
                'title' => 'product_edit',
            ],
            [
                'id'    => 56,
                'title' => 'product_show',
            ],
            [
                'id'    => 57,
                'title' => 'product_delete',
            ],
            [
                'id'    => 58,
                'title' => 'product_access',
            ],
            [
                'id'    => 59,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 60,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 61,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 62,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 63,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 64,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 65,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 66,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 67,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 68,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 69,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 70,
                'title' => 'expense_create',
            ],
            [
                'id'    => 71,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 72,
                'title' => 'expense_show',
            ],
            [
                'id'    => 73,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 74,
                'title' => 'expense_access',
            ],
            [
                'id'    => 75,
                'title' => 'income_create',
            ],
            [
                'id'    => 76,
                'title' => 'income_edit',
            ],
            [
                'id'    => 77,
                'title' => 'income_show',
            ],
            [
                'id'    => 78,
                'title' => 'income_delete',
            ],
            [
                'id'    => 79,
                'title' => 'income_access',
            ],
            [
                'id'    => 80,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 81,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 82,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 83,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 84,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 85,
                'title' => 'sale_invoice_create',
            ],
            [
                'id'    => 86,
                'title' => 'sale_invoice_edit',
            ],
            [
                'id'    => 87,
                'title' => 'sale_invoice_show',
            ],
            [
                'id'    => 88,
                'title' => 'sale_invoice_delete',
            ],
            [
                'id'    => 89,
                'title' => 'sale_invoice_access',
            ],
            [
                'id'    => 90,
                'title' => 'customer_create',
            ],
            [
                'id'    => 91,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 92,
                'title' => 'customer_show',
            ],
            [
                'id'    => 93,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 94,
                'title' => 'customer_access',
            ],
            
        ];

        Permission::insert($permissions);
    }
}