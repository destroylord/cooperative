<x-app-layout>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Angsuran </h4>
                    <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Angsuran ke</th>
                                <th>Bulan</th>
                                <th>Nilai yang dibayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>

                            @foreach ($installment as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->month }}</td>
                                <td>Rp. {{ number_format($item->amount) }}</td>
                                <td> {{ $item->status }} </td>
                                <td><button onclick="buttonBuy({{ $item->id }}, {{ $item->user_id }})" {{ ($item->status == 'Paid' ? 'disabled' : '') }} class="btn btn-danger btn-sm">Bayar</button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <p>
                    {{-- Note: Angsuran dapat dilakukan pada bulan yang sama pada tanggal {{ $installment->created_at->format('d') }} --}}
                </p>
            </div>
        </div>
    </div>

    @push('script')
    <script>

        function buttonBuy(i, user_id)
        {

            $.ajax({
                url: "/loan/installment/store/"+ i + "/"+ user_id,
                method: 'POST',
                dataType: 'JSON',
                data: {
                        _token: "{{ csrf_token() }}",
                        id : i,
                        user_id: user_id,
                },
                success: function(res)
                {
                    if (res.status == true) {
                        alert('Pembayaran telah dilakukan')
                        location.reload()
                    }
                }
            })
        }

    </script>
    @endpush
</x-app-layout>