<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommenController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
    * @param Collection $rows
    *
    * @return void
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $validator = Validator::make($row->toArray(), [
                'name' => 'required',
                'birthdate' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors(), 'row' => $row]);
                continue;
            }
            User::updateOrCreate(
                ['email' => isset($row['email']) ? $row['email'] : null],
                [
                'full_name' => isset($row['name']) ? $row['name'] : null,
                'name' => isset($row['name']) ? $row['name'] : null,
                'birthdate' =>isset( $row['birthdate']) ? $row['birthdate'] : null,
                'phone' => isset($row['phone']) ? $row['phone'] : null,
                'password' => isset($row['password']) ? Hash::make($row['password']) : null,
                'uuid'     => CommenController::generate_uuid('user')
                ]
            );
        }
    }

    /**
     * Define the batch size for bulk inserts.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 1000; 
    }

    /**
     * Define the chunk size for reading.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000; 
    }
}

