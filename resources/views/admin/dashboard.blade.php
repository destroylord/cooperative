<x-app-layout>
  <div class="row">

@php
    $data = [
      [
        'title' => 'Jumlah Anggota',
        'value' => \App\Models\User::count(),
        'icon' => '../assets/img/icons/unicons/chart-success.png',
      ],
      [
        'title' => 'Jumlah Tabungan Keseluruhan',
        'value' => \App\Models\Deposit::sum('total_amount'),
        'icon' => '../assets/img/icons/unicons/wallet-info.png',
      ],[
        'title' => 'Jumlah Pinjaman Keseluruhan',
        'value' => \App\Models\Loan::sum('total_installment'),
        'icon' => '../assets/img/icons/unicons/cc-warning.png'
      ],

  ];
@endphp

      @foreach ($data as $item)
      <div class="col-lg-3 col-md-12 col-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="{{ $item['icon'] }}"
                  alt="chart success"
                  class="rounded" />
              </div>
            </div>
            <span class="fw-medium d-block mb-1">{{ $item['title'] }}</span>
            <h3 class="card-title mb-2">{{ $item['value'] }}</h3>
          </div>
        </div>
      </div>
      @endforeach
  </div>
</x-app-layout>