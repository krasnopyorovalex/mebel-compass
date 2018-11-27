@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.pages.index') }}">Страницы</a></li>
    <li class="active">Форма редактирования страницы</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования страницы</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.pages.update', ['id' => $page->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            @select(['name' => 'slider_id', 'label' => 'Слайдер', 'items' => $sliders, 'entity' => $page])

                            <div class="form-group">
                                <label for="template">Шаблон страницы:</label>
                                <select class="form-control border-blue border-xs select-search" id="template" name="template" data-width="100%">
                                    @foreach ($page->getTemplates() as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $page->template ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @input(['name' => 'name', 'label' => 'Название', 'entity' => $page])
                            @input(['name' => 'title', 'label' => 'Title', 'entity' => $page])
                            @input(['name' => 'description', 'label' => 'Description', 'entity' => $page])
                            @input(['name' => 'keywords', 'label' => 'Keywords', 'entity' => $page])

                            @input(['name' => 'alias', 'label' => 'Alias', 'entity' => $page])
                            @textarea(['name' => 'text', 'label' => 'Текст', 'entity' => $page])

                            @submit_btn()
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@push('scripts')
<script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection
