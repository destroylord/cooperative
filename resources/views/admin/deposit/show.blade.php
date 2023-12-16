<x-app-layout>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="javascript:history.back()" class="btn btn-primary"> <i class="bx bx-arrow-back"></i></a>
                    <h4>History Tabungan </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Jenis Simpanan</th>
                                    <th>Total Simpanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposites as $depo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> 
                                        <td>{{ $depo->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            {{ $depo->type === App\Enum\TypeSavingEnum::PRINCIPAL 
                                            ? 'Simpanan Pokok' 
                                            : ($depo->type === App\Enum\TypeSavingEnum::MANDATORY 
                                            ? 'Simpanan Wajib' 
                                            : 'Simpanan Sukarela') }}
                                        </td>
                                        <td>{{ $depo->total_amount }}</td>
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