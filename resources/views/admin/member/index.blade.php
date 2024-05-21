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
                        <th>Option</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        @forelse($members as $member)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>
                                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="{{ route('member.destroy', $member->id) }}">
                                    Hapus
                                </button>
                            </td>
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

      <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Anggota</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda ingin menghapus akun ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form id="deleteForm" action="" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('script')
      <script>
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var url = button.data('url'); // Extract info from data-url attribute
                var modal = $(this);
                modal.find('#deleteForm').attr('action', url); // Update the form action
            });
      </script>
  @endpush
</x-app-layout>