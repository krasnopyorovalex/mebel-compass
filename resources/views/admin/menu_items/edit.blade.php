@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.menus.index') }}">Навигация</a></li>
    <li><a href="{{ route('admin.menu_items.index', $menuItem->menu_id) }}">Список пунктов меню</a></li>
    <li class="active">Форма редактирования пункта меню</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования пункта меню</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.menu_items.update', $menuItem) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                        <li><a href="#image" data-toggle="tab">Изображение</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            <div class="form-group">
                                <label for="parent_id">Выберите родительский пункт меню</label>
                                <select class="form-control border-blue border-xs select-search" id="parent_id" name="parent_id" data-width="100%">
                                    <option value="">Не выбрано</option>
                                    @foreach($menuItems as $item)
                                        <option value="{{ $item->id }}"  @if ( $item->id == old('parent_id', $menuItem->parent_id))selected="selected"@endif>{{ $item->name }}</option>
                                        @foreach($item->menuItems as $itemChild)
                                            <option value="{{ $itemChild->id }}"  @if ($itemChild->id == old('parent_id', $menuItem->parent_id))selected="selected"@endif>
                                                ** {{ $itemChild->name }}
                                            </option>
                                            @foreach($itemChild->menuItems as $itemSubChild)
                                                <option value="{{ $itemSubChild->id }}"  @if ($itemSubChild->id == old('parent_id', $menuItem->parent_id))selected="selected"@endif>
                                                    **** {{ $itemSubChild->name }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            @input(['name' => 'name', 'entity' => $menuItem, 'label' => 'Название'])
                            @selectLink(['name' => 'link', 'entity' => $menuItem, 'label' => 'Ссылка'])
                            @submit_btn()
                        </div>

                        <div class="tab-pane" id="image">
                            @if ($menuItem->image)
                                <div class="panel panel-flat border-blue border-xs" id="image__box">
                                    <div class="panel-body">
                                        <img src="{{ asset($menuItem->image->path) }}" alt="" class="upload__image">

                                        <div class="btn-group btn__actions">
                                            <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                            <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $menuItem->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $menuItem, 'label' => 'Выберите изображение на компьютере'])
                            @submit_btn()
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
@push('scripts')
<script src="{{ asset('dashboard/assets/js/plugins/forms/selects/select2.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/pages/form_select2.js') }}" defer></script>
@endpush
@endsection