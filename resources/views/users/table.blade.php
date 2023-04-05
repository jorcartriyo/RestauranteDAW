<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="disabled-sorting text-left">Avatar</th>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-left">Roles</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="disabled-sorting text-left">Avatar</th>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-left">Roles</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <div class="row">
                                                    <div class="col-xs-1">
                                                        <td><img class="avatar elevation-3"
                                                                @if ($user->imagen != 'default') src="{{ asset('storage/images/avatar/' . $user->imagen) }}"                                                             
                                                                @else src="{{ asset('assets/img/default-avatar.png') }}" @endif
                                                                alt="{{ $user->imagen }}"></td>
                                                    </div>

                                                </div>
                                                <td colspam="2" class="text-center">{{ $user->id }}</td>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @foreach ($user->roles as $rol)
                                                        <div class="text-center">
                                                            {{ $rol->name }}
                                                        </div>
                                                    @endforeach

                                                </td>

                                                <td class=" text-center">
                                                    {!! Form::open(['route' => ['home.destroy', [$user->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('home.show', [$user->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('home.edit', [$user->id]) !!}"
                                                            class='btn btn-link btn-warning btn-just-icon edit '>
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @if (\Auth::user()->id != $user->id)
                                                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-link btn-danger btn-just-icon remove ',
                                                                'onclick' => 'return confirm("Estás seguro de eliminar este registro?")',
                                                                'name' => 'z',
                                                            ]) !!}
                                                        @endif
                                                    </div>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
