@extends('layouts.admin')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления раздела услуги</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="parent_id">Родительская услуга</label>
                    <select class="form-control border-blue border-xs select-search" id="parent_id" name="parent_id" data-width="100%">
                        <option value="">Не выбрано</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                @input(['name' => 'name', 'label' => 'Название'])
                @input(['name' => 'title', 'label' => 'Title'])
                @input(['name' => 'description', 'label' => 'Description'])
                @input(['name' => 'alias', 'label' => 'Alias'])

                @textarea(['name' => 'preview', 'label' => 'Превью услуги', 'id' => 'editor-full2'])
                @textarea(['name' => 'text', 'label' => 'Текст'])
                @checkbox(['name' => 'is_published', 'label' => 'Опубликовано?', 'isChecked' => true])

                @submit_btn()
            </form>

        </div>
    </div>
@push('scripts')
<script src="{{ asset('dashboard/laravel-ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection