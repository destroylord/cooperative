<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form</h5>
        <small class="text-muted float-end">Default Form</small>
    </div>
    <div class="card-body">
        <x-form.input type="number" class="w-50" placeholder="Nominal %" value="{{ $interest->total_interest }}" name="total_interest" id="total_interest" label="Total Bunga" />
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>