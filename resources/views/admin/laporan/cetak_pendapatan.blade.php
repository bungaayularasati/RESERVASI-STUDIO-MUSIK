<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>.  </title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 6px;
        }

        .periode {
            text-align: center;
            margin-bottom: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background-color: #f0f0f0;
        }

        .text-right {
            text-align: right;
        }

         @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body onload="window.print()">


    <h2>LAPORAN PENDAPATAN</h2>

    <div class="periode">
    Periode :
    {{ $tanggalMulai ? \Carbon\Carbon::parse($tanggalMulai)->format('d-m-Y') : '-' }}
    s/d
    {{ $tanggalSelesai ? \Carbon\Carbon::parse($tanggalSelesai)->format('d-m-Y') : '-' }}
</div>


    <p>
        <strong>Total Pendapatan :</strong>
        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Studio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservasi as $item)
                <tr>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->studio->nama_studio ?? '-' }}</td>
                    <td class="text-right">
                        Rp {{ number_format($item->total_biaya, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align:center">
                        Tidak ada data
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Pendapatan Per Studio</h3>

    <table>
        <thead>
            <tr>
                <th>Studio</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatanPerStudio as $row)
                <tr>
                    <td>{{ $row['studio']->nama_studio ?? '-' }}</td>
                    <td class="text-right">
                        Rp {{ number_format($row['total'], 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <div class="no-print" style="margin-bottom:12px;">
        <a href="{{ route('admin.laporan.pendapatan') }}" class="btn-back">
        ⬅ Kembali
    </a>
    </div>

</body>
</html>
