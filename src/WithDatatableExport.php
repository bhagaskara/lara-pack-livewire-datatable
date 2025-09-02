<?php

namespace LaraPack\LivewireDatatable;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

trait WithDatatableExport
{
    public $showExport = true;

    abstract public function datatableExportFileName(): string;
    abstract public function datatableExportTitle(): string;

    public function datatableExportView()
    {
        return "lara-pack.livewire-datatable::export";
    }

    public function datatableExportPaperOption()
    {
        return [
            'size' => 'legal',
            'orientation' => 'portrait',
        ];
    }

    public function datatableExportSubtitle($type): array
    {
        return [];
    }

    public function datatableExport($type)
    {
        $columns = array_filter($this->datatableColumns(), function ($item) {
            return !isset($item['export']) || $item['export'] !== false;
        });

        $data = $this->datatableProcessedQuery()->get();
        $title = $this->datatableExportTitle();
        $subtitles = $this->datatableExportSubtitle($type);
        $fileName = $this->datatableExportFileName();
        $paperOption = $this->datatableExportPaperOption();
        $view = $this->datatableExportView();
        $summary = $this->summary;

        if ($type == LivewireDatatableExport::EXPORT_EXCEL) {
            return Excel::download(
                new LivewireDatatableExport(
                    view: $view,
                    title: $title,
                    subtitles: $subtitles,
                    columns: $columns,
                    data: $data,
                    summary: $summary,
                ),
                "$fileName.xlsx"
            );
        } elseif ($type == LivewireDatatableExport::EXPORT_PDF) {
            $pdf = Pdf::loadview(
                $view,
                [
                    'title' => $title,
                    'subtitles' => $subtitles,
                    'columns' => $columns,
                    'data' => $data,
                    'summary' => $summary,
                    'type' => $type,
                ],
            );

            if ($paperOption) {
                $pdf = $pdf->setPaper($paperOption['size'], $paperOption['orientation']);
            }

            return response()->stream(
                function () use ($pdf) {
                    echo $pdf->output();
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $fileName . '.pdf"',
                ]
            );
        }
    }
}
