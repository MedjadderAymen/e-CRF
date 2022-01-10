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
        return consent::all()->where("consent_state", "=", true);
    }

    public function headings(): array
    {
        return [
            '#',
            'ID Patient',
            'Age',
            'Durée Diabète',
            'Schéma Insuline',
            'Profil Glycémique ',
            'HBA1C',
            "Hématocrite",
            "Triglycérides",

            "YSI1",
            "GLUCO 1 Lot A",
            "Delta",
            "GLUCO 2 Lot A",
            "Delta",

            "YSI2",
            "GLUCO 1 Lot B",
            "Delta",
            "GLUCO 2 Lot B",
            "Delta",

            "YSI3",
            "GLUCO 1 Lot C",
            "Delta",
            "GLUCO 2 Lot C",
            "Delta",
        ];
    }

    public function map($row): array
    {

        return [
            $row->dmPatient->id,
            $row->dmPatient->identification,
            $row->crf->q141 . " ans" ?? $row->crf->q142 . " mois",
            Carbon::parse($row->crf->q13)->toDateString() ?? "N/A",
            $row->crf->q18 ?? "",
            $row->crf->q19b. " points" ?? "",
            $row->crf->q151 . " %" ?? "",
            $row->crf->q152 . " %" ?? "",
            $row->crf->q153 . " mg/dL" ?? "",

            $row->glucose->ysi_one_value . " mg/dL" ?? "",
            $row->glucose->ysi_one_value_lot_a_gluco_a_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_one_value_lot_a_gluco_a_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",
            $row->glucose->ysi_one_value_lot_a_gluco_b_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_one_value_lot_a_gluco_b_bandelette_result - $row->glucose->ysi_one_value . " mg/dL" ?? "",

            $row->glucose->ysi_two_value . " mg/dL" ?? "",
            $row->glucose->ysi_two_value_lot_b_gluco_a_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_two_value_lot_b_gluco_a_bandelette_result - $row->glucose->ysi_two_value . " mg/dL" ?? "",
            $row->glucose->ysi_two_value_lot_b_gluco_b_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_two_value_lot_b_gluco_b_bandelette_result - $row->glucose->ysi_two_value . " mg/dL" ?? "",

            $row->glucose->ysi_three_value . " mg/dL" ?? "",
            $row->glucose->ysi_three_value_lot_c_gluco_a_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_three_value_lot_c_gluco_a_bandelette_result - $row->glucose->ysi_three_value . " mg/dL" ?? "",
            $row->glucose->ysi_three_value_lot_c_gluco_b_bandelette_result . " mg/dL" ?? "",
            $row->glucose->ysi_three_value_lot_c_gluco_b_bandelette_result - $row->glucose->ysi_three_value . " mg/dL" ?? "",
        ];
    }
}