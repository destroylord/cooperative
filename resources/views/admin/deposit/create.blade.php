<x-app-layout>

     <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Tabungan {{ $user->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('deposit.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <x-form.input type="text" value="{{ $user->id }}" readonly name="user_id" id="member_id" label="Id Member" />
                                <x-form.input type="text" value="{{ $user->name }}" readonly id="name" label="Nama" />
                                <div class="mb-3">
                                    <label>Jenis Tabungan</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="-" selected disabled>Pilih salah satu</option>
                                        @foreach($deposits as $key => $value)
                                            @php
                                                $displayText = '';
                                                switch ($value) {
                                                    case 'principal':
                                                        $displayText = 'Simpanan Pokok';
                                                        break;
                                                    case 'mandatory':
                                                        $displayText = 'Simpanan Wajib';
                                                        break;
                                                    case 'voluntary':
                                                        $displayText = 'Simpanan Sukarela';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            @endphp
                                            <option value="{{ $value }}">
                                                {{ $displayText }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-form.input type="number" disabled name="total_amount" id="amount" label="Jumlah Tabungan" />
                                <p>Maximal jumlah tabungan <b class="type_name"></b> Sebesar: <b class="text-bold price"></b></p>
                                <x-primary-button type="submit">Simpan</x-primary-button>
                                <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {

                var savingsTypes = {
                    'principal': {
                        'name': 'Simpanan Pokok',
                        'price': 'Rp. 1.000.000',
                        'nominal': 1000000
                    },
                    'mandatory': {
                        'name': 'Simpanan Wajib',
                        'price': 'Rp. 500.000',
                        'nominal': 500000
                    },
                    'voluntary': {
                        'name': 'Simpanan Sukarela',
                        'price': 'Rp. 1.000',
                        'nominal': 1000
                    }
                };


               $('#type').on('change', function(){
                    var type = $(this).val();
                    var savingsType = savingsTypes[type];
                    if (savingsType) {
                        $('.type_name').text(savingsType.name);
                        $('.price').text(savingsType.price);
                        $('#amount').val('');
                        amountKeyup(savingsType.nominal);
                    }
                    $('#amount').attr('disabled', false);
               })

               function amountKeyup(nominal) {
                    $('#amount').on('input', function() {
                        var amount = $(this).val();
                        if (amount >= nominal) {
                            alert('Jumlah tabungan tidak boleh melebihi dari' + nominal);
                            $(this).val('');
                        }
                    });
               }
            })
        </script>
    @endpush
</x-app-layout>