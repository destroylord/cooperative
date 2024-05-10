<x-guest-layout>

    <x-slot:title>Register</x-slot:title />
    
    <form id="formAuthentication" autocomplete="off" class="mb-3" action="{{ route('register') }}" method="POST">
        
        <small>Sesuaikan data diri anda dengan ktp</small>
        @csrf
        
        <x-form.input id="nik" type="number" name="nik" label="nik" />
        <x-form.input id="name" type="text" name="name" label="Nama Lengkap" />
        <x-form.input id="email" type="email" name="email" label="Email" />

        <div class="row">
            <div class="col">
                <x-form.input id="place_of_birth" type="text" name="place_of_birth" label="Tempat Lahir" />
            </div>
            <div class="col">
                <x-form.input id="date_of_birth" type="date" name="date_of_birth" label="Tanggal Lahir" />
            </div>
        </div>
        <div class="mb-3">
            <small class=" d-block">Jenis Kelamin</small>
            <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L">
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
            
            @error('gender')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <x-form.textarea id="address" name="address" label="Alamat"  />
        <x-form.select id="region" name="region" label="Agama" placeholder="Pilih Salah satu" :options="[
            'islam' => 'Islam',
            'kristen' => 'Kristen',
            'katolik' => 'Katolik',
            'hindu' => 'Hindu',
            'budha' => 'Budha',
            'konghucu' => 'Konghucu'
        ]" />
        <x-form.select id="marital_status" name="marital_status" label="Status Perkawinan" placeholder="Pilih Salah satu" :options="[
            'menikah' => 'Menikah',
            'belum menikah' => 'Belum Menikah',
        ]" />
        <x-form.input id="work" type="text" name="type_work" label="Jenis Pekerjaan" />
        <x-form.input id="citizenship" type="citizenship" name="citizenship" label="Kewarganegaraan" />
        <x-form.input id="phone" type="number" name="phone" label="Nomor Telepon" />

        <div class="row">
            <div class="col">
                <x-form.input id="username" type="username" name="username" label="username" />
            </div>
            <div class="col">
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
            </div>
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        

        <div class="mb-3">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
            <label class="form-check-label" for="terms-conditions">
                Saya menyetujui
                <a href="javascript:void(0);"> kebijakan & ketentuan privasi</a>
            </label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>

    </form>

    <p class="text-center">
    <span>Already have an account?</span>
        <a href="{{ route('login') }}">
            <span>Sign in instead</span>
        </a>
    </p>
</x-guest-layout>
