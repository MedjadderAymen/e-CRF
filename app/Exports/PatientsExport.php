<?php

namespace App\Exports;

use App\Models\consent;
use App\Models\dmPatient;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return consent::whereHas('glucose')->where("consent_state", "=", true)->get();
    }

    public function headings(): array
    {
        return [
            'ID Patient',
            'Age',
            'Durée Diabète',
            'Profil Glycémique ',
            'HBA1C',
            "Hématocrite",
            "Triglycérides",

            "YSI1",

            "GLUCO 1 Lot A",
            "Delta",
            "%Delta",

            "GLUCO 2 Lot A",
            "Delta",
            "%Delta",

            "GLUCO 1 Lot B",
            "Delta",
            "%Delta",

            "GLUCO 2 Lot B",
            "Delta",
            "%Delta",

            "GLUCO 1 Lot C",
            "Delta",
            "%Delta",

            "GLUCO 2 Lot C",
            "Delta",
            "%Delta",
        ];
    }

    public function map($row): array
    {

        return [
            $row->dmPatient->identification,
            $row->crf->q141 . " ans" ?? $row->crf->q142 . " mois",
            Carbon::parse($row->crf->q13)->toDateString() ?? "N/A",
            $row->crf->q19b. " points" ?? "",
            $row->crf->q151 . " %" ?? "",
            $row->crf->q152 . " %" ?? "",
            $row->crf->q153 . " mg/dL" ?? "",

            $row->glucose->ysi_one_value . " mg/dL" ?? "",

            $row->glucose->ysi_one_value_lot_a_gluco_a_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_one_value_lot_a_gluco_a_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            (($row->glucose->ysi_one_value_lot_a_gluco_a_bandelette_result - $row->glucose->ysi_one_value)/$row->glucose->ysi_one_value)*100 ." %",

            $row->glucose->ysi_one_value_lot_a_gluco_b_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_one_value_lot_a_gluco_b_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            (($row->glucose->ysi_one_value_lot_a_gluco_b_bandelette_result - $row->glucose->ysi_one_value)/$row->glucose->ysi_one_value)*100 ." %",

            $row->glucose->ysi_two_value_lot_b_gluco_a_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_two_value_lot_b_gluco_a_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            (($row->glucose->ysi_two_value_lot_b_gluco_a_bandelette_result - $row->glucose->ysi_one_value)/$row->glucose->ysi_one_value)*100 ." %",

            $row->glucose->ysi_two_value_lot_b_gluco_b_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_two_value_lot_b_gluco_b_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            (($row->glucose->ysi_two_value_lot_b_gluco_b_bandelette_result - $row->glucose->ysi_one_value)/$row->glucose->ysi_one_value)*100 ." %",

            $row->glucose->ysi_three_value_lot_c_gluco_a_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_three_value_lot_c_gluco_a_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            (($row->glucose->ysi_three_value_lot_c_gluco_a_bandelette_result - $row->glucose->ysi_one_value)/$row->glucose->ysi_one_value)*100 ." %",

            $row->glucose->ysi_three_value_lot_c_gluco_b_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_three_value_lot_c_gluco_b_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            (($row->glucose->ysi_three_value_lot_c_gluco_b_bandelette_result - $row->glucose->ysi_one_value)/$row->glucose->ysi_one_value)*100 ." %",
        ];
    }
}
