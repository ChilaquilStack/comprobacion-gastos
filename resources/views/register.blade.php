<div class="modal fade" tabindex="-1" role="dialog" id="register">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registo de Usuarios</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('usuario.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" v-model="usuario.nombre">
                                <span class="help-block" v-if='errors.nombre' style="color: red">
                                    <strong>@{{errors.nombre[0]}}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellido_paterno" class="col-md-4 control-label">Apellido Paterno</label>
                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" v-model="usuario.apellido_paterno">
                                <span class="help-block" v-if='errors.apellido_paterno' style="color: red" >
                                    <strong>@{{errors.apellido_paterno[0]}}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellido_materno" class="col-md-4 control-label">Apellido Materno</label>
                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" v-model="usuario.apellido_materno">
                                <span class="help-block" v-if='errors.apellido_paterno' style="color: red">
                                    <strong>@{{ errors.apellido_materno[0]}}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="usuario.email">
                                <span class="help-block" v-if='errors.email' style="color: red">
                                    <strong>@{{ errors.email[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  v-model='usuario.password' required>
                                <span class="help-block" v-if="errors.password" style="color: red">
                                    <strong>@{{ errors.password[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" v-model='usuario.password_confirmation'required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" class="btn btn-primary" @click="register">
                                    Registrar
                                </button>
                            </div>
                        </div>

                    </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->