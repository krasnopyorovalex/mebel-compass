@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.catalogs.index') }}">Категории каталога</a></li>
    <li><a href="{{ route('admin.catalog_products.index', $catalog) }}">Список товаров</a></li>
    <li class="active">Форма добавления товара</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления товара</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.catalog_products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="catalog_id" value="{{ $catalog }}">

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                        <li><a href="#related" data-toggle="tab">Сопутствующие товары</a></li>
                        <li><a href="#dopCatalogs" data-toggle="tab">Дополнительные категории товара</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            <div class="form-group">
                                <label for="label">Метка:</label>
                                <select class="form-control border-blue border-xs select-search" id="slider_id" name="label" data-width="100%">
                                    @foreach ($labels as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @input(['name' => 'name', 'label' => 'Название'])
                            @input(['name' => 'title', 'label' => 'Title'])
                            @input(['name' => 'description', 'label' => 'Description'])
                            @input(['name' => 'keywords', 'label' => 'Keywords'])

                            @input(['name' => 'price', 'label' => 'Цена', 'defaultValue' => 0])

                            @input(['name' => 'alias', 'label' => 'Alias'])
                            @textarea(['name' => 'text', 'label' => 'Текст рядом со слайдером'])

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
                        <div class="tab-pane" id="related">
                            <div class="form-group">
                                <label for="products">Выберите сопутствующие товары</label>
                                <select class="form-control border-blue border-xs select-search" multiple="multiple" id="products" name="products[]" data-width="100%">
                                    @foreach($catalogProducts as $catalogProduct)
                                        <option value="{{ $catalogProduct->id }}">{{ $catalogProduct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @submit_btn()
                        </div>
                        <div class="tab-pane" id="dopCatalogs">
                            <div class="form-group">
                                <label for="dopCatalogs">Выберите дополнительные категории товара</label>
                                <select class="form-control border-blue border-xs select-search" multiple="multiple" id="dopCatalogs" name="dopCatalogs[]" data-width="100%">
                                    @foreach($catalogs as $dopCatalog)
                                        <option value="{{ $dopCatalog->id }}">{{ $dopCatalog->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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