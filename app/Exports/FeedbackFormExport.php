<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeedbackFormExport implements FromCollection, WithHeadings
{
    use Exportable;

    private string $name;
    private string $phone;
    private string $message;

    /**
     * @param string $name
     * @param string $phone
     * @param string $message
     */
    public function __construct(string $name, string $phone, string $message)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return collect([
           [
               'name' => $this->name,
               'phone' => $this->phone,
               'message' => $this->message,
           ],
        ]);
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Message',
        ];
    }
}
