<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcelData implements FromArray, ShouldAutoSize, WithHeadings
{
    protected $data;

    protected $heading;

    public function __construct(array $data, array $heading)
    {
        $this->data = $data;

        $this->heading = $heading;
    }

    public function headings(): array
    {
        return $this->heading;
    }

    public function array(): array
    {
        return $this->data;
    }
}
