@extends('layouts.admin')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования меню</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.menus.update', ['id' => $menu->id]) }}" method="post">
                @csrf
                @method('put')

                @input(['name' => 'name', 'label' => 'Название', 'entity' => $menu])
                @input(['name' => 'sys_name', 'label' => 'Системное имя', 'entity' => $menu])

                @submit_btn()
            </form>

        </div>
    </div>
@endsection