<?php

namespace App\Http\Services;

use App\Exports\FeedbackFormExport;
use Maatwebsite\Excel\Facades\Excel;

class FileFeedbackCreationService implements FeedbackCreationInterface
{
    /**
     * @param string $name
     * @param string $phone
     * @param string $message
     * @return void
     */
    public function create(string $name, string $phone, string $message): void
    {
        $newFileName = $name . '_' . time() . '.xlsx';

        Excel::store(new FeedbackFormExport($name, $phone, $message), $newFileName);
    }
}
