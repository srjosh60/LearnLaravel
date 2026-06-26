<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function productsPdf()
    {
        $products = Product::orderBy('name')->get();
        $totalValue = $products->sum('price');
        $printedAt = now()->format('d M Y, H:i') . ' WIB';

        $pdf = Pdf::loadView('admin.reports.products-pdf', compact('products', 'totalValue', 'printedAt'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-produk-hsrm-' . now()->format('Ymd') . '.pdf');
    }
}