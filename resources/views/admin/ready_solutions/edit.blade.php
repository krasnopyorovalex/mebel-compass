@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.ready_solutions.index') }}">Акции</a></li>
    <li class="active">Форма редактирования акции</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования готового решения</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                        <li><a href="#images" data-toggle="tab">Галерея</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">
                            <form action="{{ route('admin.ready_solutions.update', $readySolution) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-8">
                                        @input(['name' => 'name', 'label' => 'Название', 'entity' => $readySolution])
                                        @input(['name' => 'name_image', 'label' => 'Название на картинке', 'entity' => $readySolution])
                                        @input(['name' => 'title', 'label' => 'Title', 'entity' => $readySolution])
                                        @input(['name' => 'description', 'label' => 'Description', 'entity' => $readySolution])
                                        @input(['name' => 'keywords', 'label' => 'Keywords', 'entity' => $readySolution])

                                    </div>
                                    <div class="col-md-4">
                                        @if ($readySolution->image)
                                            <div class="panel panel-flat border-blue border-xs" id="image__box">
                                                <div class="panel-body">
                                                    <img src="{{ asset($readySolution->image->path) }}" alt="" class="upload__image">

                                                    <div class="btn-group btn__actions">
                                                        <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                                        <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $readySolution->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $readySolution, 'label' => 'Выберите изображение на компьютере'])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @input(['name' => 'price', 'label' => 'Цена', 'entity' => $readySolution])
                                        @input(['name' => 'alias', 'label' => 'Alias', 'entity' => $readySolution])

                                        <div class="form-group">
                                            <label for="products">Выберите сопутствующие товары</label>
                                            <select class="form-control border-blue border-xs select-search" multiple="multiple" id="products" name="products[]" data-width="100%">
                                                @foreach($catalogProducts as $rsOption)
                                                    <option value="{{ $rsOption->id }}" {{ in_array($rsOption->id, $rsProductRelatives) ? 'selected' : '' }}>{{ $rsOption->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @textarea(['name' => 'text', 'label' => 'Текст', 'entity' => $readySolution])
                                        @checkbox(['name' => 'in_main', 'label' => 'Отображать на главной?', 'entity' => $readySolution])
                                        @checkbox(['name' => 'is_published', 'label' => 'Опубликовано?', 'entity' => $readySolution])

                                        <hr>
                                        <h3>Табы</h3>

                                        @foreach ($tabs as $tab)
                                            <div class="form-group">
                                                <label for="editor-full-tab-{{ $tab->id }}">{{ $tab->name }}:</label>
                                                <textarea class="form-control border-blue border-xs tabs__editor" rows="" id="editor-full-tab-{{ $tab->id }}" name="tabs[{{ $tab->id }}]">{{ $readySolution->tabs[$tab->id] ?? '' }}</textarea>
                                            </div>
                                        @endforeach

                                        @submit_btn()
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="images">
                            <form action="#" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="galleryId" value="{{ $readySolution->id }}">
                                        <input type="hidden" name="uploadUrl" value="{{ route('admin.rs_images.store', $readySolution) }}">
                                        <input type="hidden" name="updatePositionUrl" value="{{ route('admin.rs_images.update_positions') }}">
                                        <input type="file" class="file-input-ajax" multiple="multiple" name="upload">
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            @if ($readySolution->images)
                                <div id="_images_box">
                                    @include('admin.ready_solutions._images_box')
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div id="edit-image" class="modal fade"></div>
    @push('scripts')
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/ui/dragula.min.js') }}" defer></script>
        <script src="{{ asset('dashboard/assets/js/pages/extension_dnd.js') }}" defer></script>
        <script src="{{ asset('dashboard/assets/js/plugins/uploaders/fileinput.min.js') }}" defer></script>
        <script src="{{ asset('dashboard/assets/js/pages/uploader_bootstrap.js') }}" defer></script>
    @endpush
    @if ($readySolution->image)
        @include('layouts.partials._image_attributes_popup', ['image' => $readySolution->image])
    @endif
@endsection