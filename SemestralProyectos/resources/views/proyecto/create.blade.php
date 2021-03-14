@extends('layouts.app')

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

<script>

    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });

        $(document).on("click",".eliminar",function(){
            var padre = $('#tabla').children().children().length;

            if (padre>1){
                console.log(padre );

                var parent = $(this).parents().get(0);
                console.log(parent );
                $(parent).remove();

            }

            // console.log($(this).parents().parents().prevObject[0].children());

        });

        // Evento que selecciona la fila y la elimina

    });
</script>


<script>

    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional2").on('click', function(){
            $("#tabla2 tbody tr:eq(0)").clone().removeClass('fila-fija2').appendTo("#tabla2");
        });

        // Evento que selecciona la fila y la elimina
        $(document).on("click",".eliminar",function(){
            var padre = $('#tabla2').children().children().length;

            if (padre>1){
                console.log(padre );

                var parent = $(this).parents().get(0);
                console.log(parent );
                $(parent).remove();

            }

            // console.log($(this).parents().parents().prevObject[0].children());

        });
    });
</script>


@endsection

@section('content')



    <section class="container shadow-4 p-5" style="background: #f2f2f2" >
        <h1 class="text-center">Crear Proyecto</h1>
        <hr>

        <div >

            <form  method="post" action="{{route('proyecto.store')}}" class="confirmarproyecto">
                @csrf


                <div class="mb-3">


                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="fecha">Fecha Actual</label>
                            <input disabled  id="fecha"  class="form-control" type="text" value="{{$hoy->format('d-m-Y')}}">




                        </div>
                        <div class="form-group col-12 col-md-6">
                          <label for="inputPassword4">Titulo Del Proyecto</label>
                          <input type="text" value="{{old('titulo')}}"  name="titulo" class="form-control" id="inputPassword4" placeholder="Titulo Proyecto">
                          @error('titulo')
                          <div class="alert alert-danger mt-1" role="alert">
                              <span>{{$message}}</span>
                          </div>
                          @enderror

                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="Objetivo">Objetivo  </label>
                            <textarea name="objetivo"  class="form-control" id="Objetivo" rows="3">{{old('objetivo')}}</textarea>
                            @error('objetivo')
                            <div class="alert alert-danger mt-1" role="alert">
                                <span>{{$message}}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="Descripcion">Descripción Del Proyecto</label>
                            <textarea name="descripcionP" class="form-control" id="Descripcion" rows="3">{{old('descripcionP')}}</textarea>
                            @error('descripcionP')
                            <div class="alert alert-danger mt-1" role="alert">
                                <span>{{$message}}</span>
                            </div>
                            @enderror
                        </div>
                    </div>



                      <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="">Modalidad</label>
                            <div class="form-check">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="modalidad" id="Voluntariado" value="Individual" {{ old('modalidad') == 'Individual' ? 'checked' : ''}} >
                                    <label class="form-check-label" for="Voluntariado">
                                        Individual
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="modalidad" id="Social" {{ old('modalidad') == 'Grupo' ? 'checked' : ''}} value="Grupo" checked  >
                                    <label class="form-check-label" for="Social">
                                        Grupo
                                    </label>
                                  </div>
                                  @error('modalidad')
                                        <div class="alert alert-danger mt-1" role="alert">
                                            <span>{{$message}}</span>
                                        </div>
                                    @enderror
                            </div>

                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="form-group col-12 col-md-6">
                                <label for="Objetivo">Nivel de proyecto</label>
                                <div class="form-check">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel" id="Individual" value="Voluntariado"  {{ old('nivel') == 'Voluntariado' ? 'checked' : ''}}  >
                                        <label class="form-check-label"  for="Individual" >
                                            Voluntariado
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel" id="En_Grupo" value="Servicio Social" {{ old('nivel') == 'Servicio Social' ? 'checked' : ''}} checked>
                                        <label class="form-check-label" for="En_Grupo">
                                            Servicio Social
                                        </label>
                                      </div>
                                      @error('nivel')
                                      <div class="alert alert-danger mt-1" role="alert">
                                          <span>{{$message}}</span>
                                      </div>
                                  @enderror
                                </div>
                            </div>
                        </div>

                      </div>

                      <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="cantidad_est" >Cantidad De Estudiantes <small class="text-secondary" >Solo numeros enteros mayores a 1</small> </label>
                            <input  id="cantidad_est" value="{{old('cantidad_est')}}" name="cantidad_est"  class="form-control" type="number" value="0">

                            @error('cantidad_est')
                                      <div class="alert alert-danger mt-1" role="alert">
                                          <span>{{$message}}</span>
                                      </div>
                            @enderror

                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="">Facultades Involucradas</label><br>


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="facultades[]"  @if(is_array(old('facultades')) && in_array('FCyT', old('facultades'))) checked @endif  id="FCyT" value="FCyT">
                            <label class="form-check-label" for="FCyT">FCyT</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" name="facultades[]" @if(is_array(old('facultades')) && in_array('FIC', old('facultades'))) checked @endif id="FIC" value="FIC">
                             <label class="form-check-label" for="FIC">FIC</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="facultades[]" @if(is_array(old('facultades')) && in_array('FIE', old('facultades'))) checked @endif id="FIE" value="FIE">
                              <label class="form-check-label" for="FIE">FIE</label>
                         </div>

                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="facultades[]" @if(is_array(old('facultades')) && in_array('FII', old('facultades'))) checked @endif id="FII" value="FII">
                              <label class="form-check-label" for="FII">FII</label>
                         </div>

                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="facultades[]" @if(is_array(old('facultades')) && in_array('FIM', old('facultades'))) checked @endif id="FIM" value="FIM">
                              <label class="form-check-label" for="FIM">FIM</label>
                         </div>

                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="facultades[]" @if(is_array(old('facultades')) && in_array('FISC', old('facultades'))) checked @endif id="FISC" value="FISC">
                              <label class="form-check-label" for="FISC">FISC</label>
                         </div>

                         @error('facultades')
                                      <div class="alert alert-danger mt-1" role="alert">
                                          <span>{{$message}}</span>
                                      </div>
                        @enderror
                        </div>


                      </div>



                </div>



                <div class="form-row">
                    <div class="form-group col-12 col-md-12 ">
                        <label for="perfil_est">Perfil Del Estudiante</label>
                        <textarea name="perfil_est"  class="form-control" id="perfil_est" rows="3">{{old('perfil_est')}}</textarea>
                        @error('perfil_est')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="p-2 formDinamicos shadow-4 p-4"  style="background: #e0e0e0">
                    <h4 class="text-center pad-basic no-btm">Datos De Participantes</h4>
                   <div class="table-responsive">
                    <table class="table "  id="tabla">

                        <tr class="fila-fija">
                            <td class="eliminar "><input type="button" class="btn btn-danger"   value="Menos -"/></td>
                            <td>
                                <input required value="{{old('nombre_participante[1]')}}" name="nombre_participante[]" placeholder="Nombre"/>


                            </td>
                            <td>
                                <input  required type="text" name="cedula_participante[]" placeholder="Cédula"/>

                            </td>
                            <td>
                                <input required  type="number" name="telefono_participante[]" placeholder="Celular"/>

                            </td>
                            <td>
                                <input  required type="number"  name="telefono_residencial_p[]" placeholder="teléfono Residencial"/>

                            </td>
                        </tr>
                    </table>

                   </div>

                    <div class="btn-der">
                        <button id="adicional" name="adicional" type="button" class="btn btn-primary btn-block"> Más + </button>

                    </div>
                </div>

                <div class="p-2 mt-3  shadow-4 p-4" class="formDinamicos" style="background: #e0e0e0">
                    <h4 class="text-center pad-basic no-btm">Programa De Actividades A Desarrollar</h4>
                    <div class="table-responsive">
                        <table class="table"  id="tabla2">
                            <tr class="fila-fija2">
                                <td> <textarea required class="form-control" name="actividad[]" id="exampleFormControlTextarea1" placeholder="Descripcion" rows="3"></textarea></td>
                                <td required colspan="2"><input  type="number"  width="100"   name="tiempo[]" class="form-control" placeholder="Tiempo"/></td>
                                <td class="eliminar "><input  type="button" class="btn btn-danger"   value="Menos -"/></td>
                            </tr>


                        </table>
                    </div>


                    <div class="btn-der">
                        <button id="adicional2" name="adicional" type="button" class="btn btn-primary btn-block"> Más + </button>

                    </div>
                </div>


                <div class="form-row mt-3">
                    <div class="form-group col-12 col-md-6">
                        <label for="descripcion_producto">Descripción Del Producto</label>
                        <textarea name="descripcion_producto"  class="form-control" id="descripcion_producto" rows="3">{{old('descripcion_producto')}}</textarea>
                        @error('descripcion_producto')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="tiempo_estimado">Tiempo Estimado <small class="text-secondary" >Solo numeros enteros mayores a 1</small></label>
                        <input type="number"  value="{{old('tiempo_estimado')}}"   name="tiempo_estimado" class="form-control" id="tiempo_estimado" placeholder="Tiempo Estimado">
                        @error('tiempo_estimado')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Requiere Docente</label>
                        <div class="form-check">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="requiere_docente" id="Si" value="Si" {{ old('requiere_docente') == 'Si' ? 'checked' : ''}} >
                                <label class="form-check-label" for="Si">
                                    Si
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="requiere_docente" id="No" {{ old('requiere_docente') == 'No' ? 'checked' : ''}}  checked value="No" >
                                <label class="form-check-label" for="No">
                                    No
                                </label>
                              </div>
                              @error('requiere_docente')
                                    <div class="alert alert-danger mt-1" role="alert">
                                        <span>{{$message}}</span>
                                    </div>
                                @enderror
                        </div>

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="materiales_requeridos">Materiales Requeridos</label>
                        <input type="text"  value="{{old('materiales_requeridos')}}"  name="materiales_requeridos" class="form-control" id="materiales_requeridos" placeholder="Materiales Requeridos">
                        @error('materiales_requeridos')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="facilidades">Facilidades Ofrece</label>
                        <input type="text"  value="{{old('facilidades')}}"  name="facilidades" class="form-control" id="facilidades" placeholder="Facilidades Requeridas">
                        @error('facilidades')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="lugar">Lugar</label>
                        <input type="text"  value="{{old('lugar')}}"  name="lugar" class="form-control" id="lugar" placeholder="Lugar">
                        @error('lugar')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="descripcion_lugar">Descripción Del lugar</label>
                        <textarea name="descripcion_lugar"  class="form-control" id="descripcion_lugar" rows="3">{{old('descripcion_lugar')}}</textarea>
                        @error('descripcion_lugar')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                    </div>

                     <div class="form-group col-12 col-md-6">
                        <label for="proponete">Proponete</label>
                        <input type="text"  value="{{old('proponete')}}"  name="proponete" class="form-control" id="proponete" placeholder="Proponente">
                        @error('proponete')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>
                     <div class="form-group col-12 col-md-6">
                        <label for="responsabilidades">Responsable</label>
                        <input type="text"  value="{{old('responsabilidades')}}"  name="responsabilidades" class="form-control" id="responsabilidades" placeholder="Responsable">
                        @error('responsabilidades')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="cedula">Cédula</label>
                        <input type="text"  value="{{old('cedula')}}"  name="cedula" class="form-control" id="cedula" placeholder="Cédula">
                        @error('cedula')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="telefono_oficina">Teléfono De Oficina <small class="text-secondary" >Solo numeros  ejep. 7 digitos ( 3333444 )</small></label>
                        <input type="number"  value="{{old('telefono_oficina')}}"  name="telefono_oficina" class="form-control" id="telefono_oficina" placeholder="Teléfono Oficina">
                        @error('telefono_oficina')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="telefono_movil">Teléfono De Movil <small class="text-secondary" >Solo numeros  ejep.  8 digitos ( 33334444 )</small></label>
                        <input type="number"  value="{{old('telefono_movil')}}"  name="telefono_movil" class="form-control" id="telefono_movil" placeholder="Teléfono Movil">
                        @error('telefono_movil')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>
                    <div class="form-group col-12 col-md-6 ">
                        <label for="correo">Correo <small class="text-secondary" >A este correo llegara la notificacón si el proyecto es aceptado o rechazado</small> </label>
                        <input type="text"  value="{{old('correo')}}"  name="correo" class="form-control" id="correo" placeholder="Correo">
                        @error('correo')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 ">
                        <label for="supervisor">Supervisor</label>
                        <input type="text"  value="{{old('supervisor')}}"  name="supervisor" class="form-control" id="supervisor" placeholder="Supervisor">
                        @error('supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6 ">
                        <label for="correo_supervisor">Correo Supervisor</label>
                        <input type="email"  value="{{old('correo_supervisor')}}"  name="correo_supervisor" class="form-control" id="correo_supervisor" placeholder="Correo Supervisor">
                        @error('correo_supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6 ">
                        <label for="telefono_oficina_supervisor">Telefono De La Oficina Del Supervisor <small class="text-secondary" >Solo numeros  ejep. 7 digitos ( 3333444 )</small></label>
                        <input type="number"  value="{{old('telefono_oficina_supervisor')}}"  name="telefono_oficina_supervisor" class="form-control" id="telefono_oficina_supervisor" placeholder="Telefono De La Oficina Del Supervisor">
                        @error('telefono_oficina_supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 ">
                        <label for="telefono_movil_supervisor">Telefono Movil Del Supervisor <small class="text-secondary" >Solo numeros  ejep. 8 digitos ( 33334444 )</small></label>
                        <input type="number"  value="{{old('telefono_movil_supervisor')}}"  name="telefono_movil_supervisor" class="form-control" id="telefono_movil_supervisor" placeholder="Telefono Movil Del Supervisor">
                        @error('telefono_movil_supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                </div>


                <input type="submit"  class="btn btn-primary mt-3 btn-block"/>
                <a href="{{route('inicio.index')}}" value="Regresar" class="btn btn-info mt-3 btn-block">Regresar</a>

			</form>


        </div>

    </section>


@endsection
@section('scripFinales')
<script>


    $(function(){
            $('.confirmarproyecto').submit(function (ev) {
                ev.preventDefault();
                Swal.fire({
                    title: 'Esta seguro?',
                    text: "El proyecto sera enviado!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Enviar Proyecto!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();

                    }
                    })

        });

    });


</script>

@endsection
