@push('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.css') }}">

@endpush

@push('script')
    <script src="{{ asset('assets/vendor/libs/datatables/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/tables-datatables-basic.js') }}"></script>
@endpush

<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Anggota pendaftaran koperasi</h4>
                </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        @forelse($members as $member)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                        <tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">Data Masih belum ada</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>