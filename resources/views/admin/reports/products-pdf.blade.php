<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #222; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #001B44; padding-bottom: 10px; }
        .header h2 { color: #001B44; margin: 0; letter-spacing: 1px; }
        .header p { color: #C5A059; margin: 2px 0 0; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 6px 8px; text-align: left; }
        th { background-color: #001B44; color: #fff; }
        tr:nth-child(even) { background-color: #f7f7f7; }
        .text-right { text-align: right; }
        .total-row td { font-weight: bold; background-color: #f0e6d2; }
        .footer { margin-top: 25px; font-size: 10px; color: #777; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA PRODUK</h2>
        <p>HSRM Official - Fashion Brand</p>
    </div>

    <p>Dicetak pada: {{ $printedAt }}</p>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Nama Produk</th>
                <th width="15%">Kategori</th>
                <th width="15%">Status</th>
                <th width="30%" class="text-right">Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $i => $product)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category ?? '-' }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $product->status)) }}</td>
                <td class="text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;">Belum ada data produk.</td></tr>
            @endforelse
        </tbody>
        @if ($products->count() > 0)
        <tfoot>
            <tr class="total-row">
                <td colspan="4" class="text-right">TOTAL NILAI PRODUK</td>
                <td class="text-right">Rp {{ number_format($totalValue, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="footer">
        Laporan ini dibuat otomatis oleh sistem Admin HSRM.
    </div>
</body>
</html>