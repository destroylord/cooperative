<x-app-layout>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Laporan Data Pinjaman</h4>
                    <div>
                        <select name="" id="" class="form-control">
                            <option value="-">Pilih Bulan</option>
                            @for ($i = 0; $i < 12; $i++)
                                <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                            @endfor
                        </select>
                    </div>
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
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    {{-- <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->user->name }}</td>
                                <td>Rp. {{ number_format($loan->total_loan) }}</td>
                                <td>{{ $loan->interest->name }} - {{ $loan->interest->total_interest }}%</td>
                                <td>Rp. {{ number_format($loan->total_interest) }}</td>
                                <td>{{ $loan->long_installment }} Bulan</td>
                                <td>Rp. {{ number_format($loan->total_installment) }}</td>
                                <td>
                                    <a href="{{ route('loan.installment', $loan->user->id) }}" class="btn btn-info btn-sm text-center">Lihat Angsuran</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>