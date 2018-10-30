@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.ready_solutions.index') }}">Акции</a></li>
    <li class="active">Форма добавления акции</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления готового решения</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.ready_solutions.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            @input(['name' => 'name', 'label' => 'Название'])
                            @input(['name' => 'name_image', 'label' => 'Название на картинке'])
                            @input(['name' => 'title', 'label' => 'Title'])
                            @input(['name' => 'description', 'label' => 'Description'])
                            @input(['name' => 'keywords', 'label' => 'Keywords'])
                            @input(['name' => 'alias', 'label' => 'Alias'])
                            @input(['name' => 'price', 'label' => 'Цена', 'defaultValue' => 0])
                            @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                            @textarea(['name' => 'text', 'label' => 'Текст'])
                            @checkbox(['name' => 'in_main', 'label' => 'Отображать на главной?', 'isChecked' => true])
                            @checkbox(['name' => 'is_published', 'label' => 'Опубликовано?', 'isChecked' => true])
                            <hr>
                            <h3>Табы</h3>

                            @foreach ($tabs as $tab)
                                <div class="form-group">
                                    <label for="editor-full-tab-{{ $tab->id }}">{{ $tab->name }}:</label>
                                    <textarea class="form-control border-blue border-xs tabs__editor" rows="" id="editor-full-tab-{{ $tab->id }}" name="tabs[{{ $tab->id }}]"></textarea>
                                </div>
                            @endforeach

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