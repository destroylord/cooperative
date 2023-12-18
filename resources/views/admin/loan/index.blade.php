<x-app-layout>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Pinjaman</h4>
                    <a href="{{ route('loan.create') }}" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Tambah Pinjaman</a>
                </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
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
    </div>
</x-app-layout>