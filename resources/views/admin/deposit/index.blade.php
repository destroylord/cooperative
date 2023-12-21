<x-app-layout>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Tabungan</h4>
                </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
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
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($data as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user['user']->name }}</td>
                            <td>{{ $user['user']->address }}</td>
                            <td>{{ $user['user']->phone }}</td>
                            <td>{{ $user['data']['simpanan_pokok'] }}</td>
                            <td>{{ $user['data']['simpanan_wajib'] }}</td>
                            <td>{{ $user['data']['simpanan_sukarela'] }}</td>
                            <td>{{ $user['data']['total_simpanan'] }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('deposit.create', $user['user']->id) }}" class="btn btn-primary"> <i class="bx bx-plus"></i></a>
                                <a href="{{ route('deposit.history', $user['user']->id) }}" class="btn btn-info"> <i class="bx bx-info-circle"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>