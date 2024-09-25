<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id','name','email','phone','address','created_at','updated_at')->get();
    }

    public function headings(): array{
        return ['Id', 'Name', 'Email', 'Phone', 'Address', 'Created_at', 'Updated_at'];
    }
}
