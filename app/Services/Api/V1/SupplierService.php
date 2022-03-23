<?php


namespace App\Services\Api\V1;


use App\Services\Api\V1\Interfaces\AuthTypeInterface;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;

class SupplierService implements AuthTypeInterface
{

    public function findByEmail($email)
    {
        return Supplier::where('email', $email)->first();
    }

    public function customRules()
    {
        //add any custom rules for this user type
        return [

        ];
    }

    public function create(array $data)
    {
        return Supplier::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
