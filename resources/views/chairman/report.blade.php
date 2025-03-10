<x-app-layout>

     <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Pinjaman</h4>
                    <div>
                        <button type="button" class="btn btn-primary" onclick="printTableLoan()"><i class="bx bx-print"></i> Print</button>
                    </div>
                </div>
            <div class="table-responsive text-nowrap">
                <table class="table" id="dataTableLoan">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Total Bunga</th>
                        <th>Bunga</th>
                        <th>Lama angsuran</th>
                        <th>Besar angsuran</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->user->name }}</td>
                                <td>Rp. {{ number_format($loan->total_loan) }}</td>
                                <td>{{ $loan->interest->name }} - {{ $loan->interest->total_interest }}%</td>
                                <td>Rp. {{ number_format($loan->total_interest) }}</td>
                                <td>{{ $loan->long_installment }} Bulan</td>
                                <td>Rp. {{ number_format($loan->total_installment) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="col-md-6">
                        <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Laporan Data Simpanan</h4>
                    <div>
                        <button type="button" class="btn btn-primary" onclick="printTableDeposit()"><i class="bx bx-print"></i> Print</button>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dataTableDeposit">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Total Simpanan Pokok</th>
                                <th>Total Simpanan Wajib</th>
                                <th>Total Simpanan Sukarela</th>
                                <th>Total Simpanan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data rows go here -->
                        @forelse ($deposite as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user['user']->name }}</td>
                                <td>{{ $user['user']->address }}</td>
                                <td>{{ $user['user']->phone }}</td>
                                <td>{{ $user['data']['simpanan_pokok'] ?? 0 }}</td>
                                <td>{{ $user['data']['simpanan_wajib'] ?? 0 }}</td>
                                <td>{{ $user['data']['simpanan_sukarela'] ?? 0 }}</td>
                                <td>{{ $user['data']['total_simpanan'] ?? 0 }}</td>
                                <td>{{ $user['data']['created_at'] ? \Carbon\Carbon::parse($user['data']['created_at'])->format('d-m-Y') : '' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="9">Data Masih belum ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <script>
        function printTableLoan() {
            const table = document.getElementById("dataTableLoan");
            const printWindow = window.open("", "_blank");
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                <head>
                    <title>Laporan Data Pinjaman</title>
                </head>
                <body>
                    <table style="border-collapse: collapse; border: 1px solid black">
                        <thead style="border-bottom: 1px solid black">
                            <tr>
                                <th style="border-right: 1px solid black; padding: 5px">No.</th>
                                <th style="border-right: 1px solid black; padding: 5px">Nama</th>
                                <th style="border-right: 1px solid black; padding: 5px">Jumlah Pinjaman</th>
                                <th style="border-right: 1px solid black; padding: 5px">Bunga</th>
                                <th style="border-right: 1px solid black; padding: 5px">Total Bunga</th>
                                <th style="border-right: 1px solid black; padding: 5px">Lama angsuran</th>
                                <th style="border-right: 1px solid black; padding: 5px">Besar angsuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${Array.from(table.querySelectorAll('tbody tr')).map(tr => `<tr>${Array.from(tr.querySelectorAll('td')).map(td => `<td style="border-right: 1px solid black; padding: 5px">${td.innerHTML}</td>`).join('')}</tr>`).join('')}
                        </tbody>
                    </table>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }

            function printTableDeposit() {
            const table = document.getElementById("dataTableDeposit");
            const printWindow = window.open("", "_blank");
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                <head>
                    <title>Laporan Data Simpanan</title>
                </head>
                <body>
                    <table style="border-collapse: collapse; border: 1px solid black">
                        <thead style="border-bottom: 1px solid black">
                            <tr>
                                <th style="border-right: 1px solid black; padding: 5px">No.</th>
                                <th style="border-right: 1px solid black; padding: 5px">Nama</th>
                                <th style="border-right: 1px solid black; padding: 5px">Alamat</th>
                                <th style="border-right: 1px solid black; padding: 5px">No HP</th>
                                <th style="border-right: 1px solid black; padding: 5px">Total Simpanan Pokok</th>
                                <th style="border-right: 1px solid black; padding: 5px">Total Simpanan Wajib</th>
                                <th style="border-right: 1px solid black; padding: 5px">Total Simpanan Sukarela</th>
                                <th style="border-right: 1px solid black; padding: 5px">Total Simpanan</th>
                                <th style="padding: 5px">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${Array.from(table.querySelectorAll('tbody tr')).map(tr => `<tr>${Array.from(tr.querySelectorAll('td')).map(td => `<td style="border-right: 1px solid black; padding: 5px">${td.innerHTML}</td>`).join('')}</tr>`).join('')}
                        </tbody>
                    </table>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</x-app-layout>