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
                        <x-form.input type="text" name="member_id" id="member_id" label="Id Member" />
                        <x-form.input type="text" name="name" id="name" label="Nama" />
                        <x-form.input type="number" min="0" max="12" onchange="calculateAngsuran()" name="amount" id="amount" label="Jumlah Pinjaman" />
                        <div class="mb-3">
                            <label class="form-label">Bunga</label>
                            <select name="interest_type" onchange="calculateAngsuran()" id="interest_type" class="form-control"> 
                                <option value="-" selected disabled>Pilih salah satu</option>
                                @foreach ($interests as $interest)
                                    <option value="{{ $interest->id }}">{{ $interest->name }} - {{ $interest->total_interest }}%</option>
                                @endforeach
                            </select>
                        </div>
                        <x-form.input readonly type="number" name="total_interest" id="total_interest" label="Total Bunga" />
                        <div class="mb-3">
                            <label class="form-label">Lama angsuran</label>
                            <select name="duration" onchange="calculateAngsuran()" id="duration" class="form-control" id="">
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
            $('#interest_type').change(calculateInterest);
            $('#amount').change(calculateInterest);

            function calculateInterest() {
                let amount = $('#amount').val();
                let selectedInterest = $('#interest_type').val();
                let totalInterest = @json($interests).find(interest => interest.id == selectedInterest)?.total_interest || 0;
                let total = amount * (totalInterest / 100);

                $('#total_interest').val(total);
            }

            function calculateAngsuran(){
                let amount = parseFloat($('#amount').val());
                let duration = parseFloat($('#duration').val());
                let totalInterest = parseInt($('#total_interest').val());

                let result = amount / duration + totalInterest;
                $('#total').val(result);
            };

        </script>
    @endpush
</x-app-layout>