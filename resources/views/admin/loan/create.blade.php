<x-app-layout>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Pinjaman</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        {{-- Search member --}}
                        <div class="d-flex justify-content-start gap-2 align-items-center">
                            <x-form.input type="text" placeholder="Cari berdasarkan id" name="user_id" id="user_id" label="Id Member" />
                            <button type="button" id="btn-search" class="btn btn-primary mt-3">Cari</button>
                        </div>
                        <x-form.input type="text" readonly name="name" id="name" label="Nama" />
                        {{-- //Search member --}}
                        
                        <x-form.input type="number" min="0" max="12" onchange="calculateInstallments()" name="amount" id="amount" label="Jumlah Pinjaman" />
                        <div class="mb-3">
                            <label class="form-label">Bunga</label>
                            <select name="interest_type" onchange="calculateInstallments()" id="interest_type" class="form-control"> 
                                <option value="-" selected disabled>Pilih salah satu</option>
                                @foreach ($interests as $interest)
                                    <option value="{{ $interest->id }}">{{ $interest->name }} - {{ $interest->total_interest }}%</option>
                                @endforeach
                            </select>
                        </div>
                        <x-form.input readonly type="number" name="total_interest" id="total_interest" label="Total Bunga" />
                        <div class="mb-3">
                            <label class="form-label">Lama angsuran</label>
                            <select name="duration" onchange="calculateInstallments()" id="duration" class="form-control" id="">
                                <option value="-" selected disabled>Pilih salah satu</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }} Bulan</option>
                                @endfor
                            </select>
                        </div>
                        <x-form.input readonly type="number" name="total" id="total" label="Besar Angsuran" />
                        <x-primary-button>Submit</x-primary-button>
                       <a href="{{route('loan.index')}}" class="btn btn-secondary btn-md">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>

            $('#btn-search').on('click', function() {
                let userId = $('#user_id').val();
               
                $.ajax({
                    url: "/loan/user/" + userId,
                    type: 'GET',
                    data: {
                        user_id: userId
                    },
                    success: function(response) {
                        (response.data) 
                            ? $('#name').val(response.data.name) 
                            : alert(response.message);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });

            // Calculate interest and Installements
            $('#interest_type').change(calculateInterest);
            $('#amount').change(calculateInterest);

            function calculateInterest() {
                let amount = $('#amount').val();
                let selectedInterest = $('#interest_type').val();
                let totalInterest = @json($interests).find(interest => interest.id == selectedInterest)?.total_interest || 0;
                let total = amount * (totalInterest / 100);

                $('#total_interest').val(total);
            }

            function calculateInstallments(){
                let amount = parseFloat($('#amount').val());
                let duration = parseFloat($('#duration').val());
                let totalInterest = parseInt($('#total_interest').val());

                let result = amount / duration + totalInterest;
                $('#total').val(result);
            };

        </script>
    @endpush
</x-app-layout>