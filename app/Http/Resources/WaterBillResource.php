<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WaterBillResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'bill_no' => $this->bill_no,
            'bill_date' => (new Carbon($this->bill_date))->format('Y m d'),
            'due_date' => (new Carbon($this->due_date))->format('Y-m-d'),
            'bill_amount' => $this->bill_amount,
            'status' => $this->status,
            'customer' => new CustomerResource($this->customer),
            'created_at' => (new Carbon($this->created_at))->format('Y-m-d'),
            'updated_at' => (new Carbon($this->updated_at))->format('Y-m-d'),
        ];
    }
}
