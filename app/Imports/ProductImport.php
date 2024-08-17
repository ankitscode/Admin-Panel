<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading,ShouldQueue
{
    /**
     * @param Collection $collection
     *
     * @return void
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $validator = Validator::make($row->toArray(), [
                'uniquecode' => 'required|integer|unique:products,uniquecode',
                'name'       => 'required|string',
                'price'      => 'required|numeric|min:0',
            ]);
            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors(), 'row' => $row]);
                continue;
            }
   
            Product::updateOrCreate(
                [
                    'uniquecode' => isset($row['uniquecode'])? $row['uniquecode']:null,
                ],
                [
                    'productname' => isset($row['name']) ? $row['name'] : null,
                    'price' => isset($row['price']) ? $row['price'] : null,
                ]
            );
            Log::debug('Product created or updated with unique code');
        }
    }

    /**
     * The number of rows to insert per batch.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 1000; // Adjust batch size as needed
    }

    /**
     * The number of rows to read per chunk.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000; // Adjust chunk size as needed
    }
}
