<x-app-layout>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Simpanan Anda</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Angsuran ke</th>
                                    <th>Bulan</th>
                                    <th>Nilai yang dibayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($installments as $installment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $installment->month }}</td>
                                        <td>Rp. {{ number_format($installment->amount) }}</td>
                                        <td> {{ $installment->status }} </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pinjaman Anda</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                <th>No.</th>
                                <th>Total Bunga</th>
                                <th>Bunga</th>
                                <th>Total Pinjaman</th>
                                <th>Lama angsuran</th>
                                <th>Total angsuran</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp. {{ number_format($loan->total_loan) }}</td>
                                        <td>{{ $loan->interest->name }}</td>
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
    </div>
</x-app-layout>