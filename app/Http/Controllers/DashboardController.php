<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Carbon\Carbon;

use App\Models\Pemeriksaan;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index() {
        $today = date('Y-m-d');
        $pemeriksaan = pemeriksaan::select('pasien_id')->whereBetween('created_at', [$today.' 00:00:00', $today.' 23:59:59'])->get();
        $pemeriksaan_kurang_sehat = pemeriksaan::select('pasien_id')->whereBetween('created_at', [$today.' 00:00:00', $today.' 23:59:59'])->where('kategori', 'kurang gizi')->get();

        $pasien = pasien::all();

        $countPemeriksaan = $pemeriksaan->groupBy('pasien_id')->count();
        $countPemeriksaanKurangSehat = $pemeriksaan_kurang_sehat->groupBy('pasien_id')->count();

        $pemeriksaan_tanggal = array();
        $pemeriksaan_all_array = array();
        $pemeriksaan_kurang_gizi_array = array();
        for ($i=0; $i < 12; $i++) { 
            $day = date('Y-m-d', strtotime('-'.$i.' day', strtotime($today)));
            
            $pemeriksaan_all_eloquent = pemeriksaan::select('pasien_id')->whereBetween('created_at', [$day.' 00:00:00', $day.' 23:59:59'])->get();
            $pemeriksaan_all = $pemeriksaan_all_eloquent->groupBy('pasien_id')->count();

            $pemeriksaan_kurang_gizi_eloquent = pemeriksaan::select('pasien_id')->whereBetween('created_at', [$day.' 00:00:00', $day.' 23:59:59'])->where('kategori', 'kurang gizi')->get();
            $pemeriksaan_kurang_gizi = $pemeriksaan_kurang_gizi_eloquent->groupBy('pasien_id')->count();

            array_push($pemeriksaan_all_array, $pemeriksaan_all);
            array_push($pemeriksaan_kurang_gizi_array, $pemeriksaan_kurang_gizi);
            array_push($pemeriksaan_tanggal, date('d M', strtotime($day)));
        }

        return view('admin/dashboard', compact(
            'countPemeriksaan', 
            'countPemeriksaanKurangSehat', 
            'pasien',
            'pemeriksaan_all_array',
            'pemeriksaan_kurang_gizi_array',
            'pemeriksaan_tanggal'
        ));
    }

    public function printDataAnakXsl() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Umur');
        $sheet->setCellValue('D1', 'Alamat');

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

        $spreadsheet->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold( true );

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );

        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B1')->applyFromArray($styleArray);
        $sheet->getStyle('D1')->applyFromArray($styleArray);
        $sheet->getStyle('C1')->applyFromArray($styleArray);
        
        $data = pasien::all();
        $i = 2;
        $no = 1;
        $today = date("Y-m-d");
        foreach ($data as $key => $value) {
            $birthDate = date("Y-m-d", strtotime($value->tglLahir));
            $diff = date_diff(date_create($today), date_create($birthDate));
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->nama);
            $sheet->setCellValue('C'.$i, $diff->format('%y')."Thn ".$diff->format('%m')."Bulan");
            $sheet->setCellValue('D'.$i, $value->alamat);
            
            $sheet->getStyle('A'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('B'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('C'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('D'.$i)->applyFromArray($styleArray);
            $i++;
        }
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data karyawan.xlsx"');
        header('Cache-Control: max-age=0');
        // $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
        // ob_end_clean();
        $writer->save('php://output');
        // return $writer->save('Data karyawan.xlsx');
        // echo "<script>window.location = 'Data karyawan.xlsx'</script>";
    }
}
