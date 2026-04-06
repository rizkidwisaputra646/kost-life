<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Kost-Life</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; line-height: 1.5; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #10b981; padding-bottom: 20px; }
        .header h1 { color: #10b981; margin: 0; font-size: 28px; text-transform: uppercase; }
        .header p { margin: 5px 0; color: #666; font-size: 14px; }
        
        .summary { margin-bottom: 30px; background: #f9fafb; padding: 20px; border-radius: 10px; border: 1px solid #e5e7eb; }
        .summary-grid { display: table; width: 100%; }
        .summary-item { display: table-cell; width: 33.33%; text-align: center; }
        .summary-label { font-size: 10px; font-weight: bold; color: #9ca3af; text-transform: uppercase; margin-bottom: 5px; }
        .summary-value { font-size: 18px; font-weight: bold; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #10b981; color: white; text-align: left; padding: 12px; font-size: 12px; text-transform: uppercase; }
        td { padding: 12px; border-bottom: 1px solid #e5e7eb; font-size: 11px; }
        tr:nth-child(even) { background-color: #f9fafb; }
        
        .income { color: #10b981; font-weight: bold; }
        .expense { color: #ef4444; font-weight: bold; }
        
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #9ca3af; padding: 20px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Kost-Life Report</h1>
        <p>Laporan Riwayat Keuangan: {{ $user->name }}</p>
        <p>Dicetak pada: {{ now()->format('d F Y, H:i') }}</p>
    </div>

    <div class="summary">
        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-label">Total Pemasukan</div>
                <div class="summary-value income">Rp {{ number_format($total_income, 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Total Pengeluaran</div>
                <div class="summary-value expense">Rp {{ number_format($total_expense, 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Saldo Akhir</div>
                <div class="summary-value">Rp {{ number_format($balance, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $tx)
                <tr>
                    <td>{{ $tx->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $tx->description }}</td>
                    <td style="text-transform: capitalize;">{{ $tx->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                    <td class="{{ $tx->type }}">
                        {{ $tx->type == 'income' ? '+' : '-' }} Rp {{ number_format($tx->amount, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Laporan otomatis dari Kost-Life App &bull; Dibuat oleh Developer
    </div>
</body>
</html>
