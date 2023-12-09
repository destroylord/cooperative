<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('cooperative-interest.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.interest.partials.form')
            </form>
        </div>
    </div>
</x-app-layout>