@extends('layouts.app')


@section('content')



    <section class="container shadow-4 p-5" style="background: #f2f2f2" >
        <h1 class="text-center">Crear Proyecto</h1>
        <hr>

        <div >



                <div class="mb-3">


                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="fecha">Fecha</label>
                            <input disabled  id="fecha"  class="form-control" type="text" value="{{$proyecto->created_at->format('d-m-Y')}}">




                        </div>
                        <div class="form-group col-12 col-md-6">
                          <label for="inputPassword4">Titulo Del Proyecto</label>
                          <input type="text" value="{{$proyecto->titulo}}" disabled  name="titulo" class="form-control" id="inputPassword4" placeholder="Titulo Proyecto">
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
                            <textarea name="objetivo"  disabled class="form-control" id="Objetivo" rows="3">{{$proyecto->objetivo}}</textarea>
                            @error('objetivo')
                            <div class="alert alert-danger mt-1" role="alert">
                                <span>{{$message}}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="Descripcion">Descripción Del Proyecto</label>
                            <textarea name="descripcionP" class="form-control" id="Descripcion" disabled rows="3">{{$proyecto->descripcionP}}</textarea>
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
                                    <input class="form-check-input" type="radio" disabled name="modalidad" id="Voluntariado" value="Individual" {{ $proyecto->modalidad == 'Individual' ? 'checked' : ''}} >
                                    <label class="form-check-label" for="Voluntariado">
                                        Individual
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="modalidad" disabled id="Social" {{ $proyecto->modalidad == 'Grupo' ? 'checked' : ''}} value="Grupo" >
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
                                        <input class="form-check-input" type="radio" name="nivel" id="Individual" value="Voluntariado" disabled  {{ $proyecto->nivel == 'Voluntariado' ? 'checked' : ''}}  >
                                        <label class="form-check-label"  for="Individual" >
                                            Voluntariado
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel" id="En_Grupo" value="Servicio Social" disabled {{ $proyecto->nivel == 'Servicio Social' ? 'checked' : ''}} >
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
                            <label for="cantidad_est">Cantidad De Estudiantes <small class="text-secondary" >Solo numeros enteros mayores a 1</small> </label>
                            <input min="0" value="{{$proyecto->cantidad_est}}" disabled id="cantidad_est" name="cantidad_est"  class="form-control" type="number" value="0">

                            @error('cantidad_est')
                                      <div class="alert alert-danger mt-1" role="alert">
                                          <span>{{$message}}</span>
                                      </div>
                            @enderror

                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="facultades">Facultades Involucradas</label><br>
                          <input type="text" value="{{$proyecto->facultades}}" disabled  name="facultades" class="form-control" id="facultades" placeholder="Titulo Proyecto">


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
                        <textarea name="perfil_est"  class="form-control" id="perfil_est" rows="3">{{$proyecto->perfil_est}}</textarea>
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
                        @foreach ($proyecto->participantes as $item)
                        <tr class="fila-fija">
                            <td class="eliminar "><input type="button" disabled class="btn btn-danger"   value="Menos -"/></td>
                            <td>
                                <input  disabled name="nombre_participante[]" value="{{$item->nombre_participante}}" placeholder="Nombre"/>


                            </td>
                            <td>
                                <input disabled type="text" value="{{$item->cedula_participante}}" name="cedula_participante[]" placeholder="Cédula"/>

                            </td>
                            <td>
                                <input disabled type="number" value="{{$item->telefono_participante}}" name="telefono_participante[]" placeholder="Celular"/>

                            </td>
                            <td>
                                <input disabled type="number" value="{{$item->telefono_residencial_p}}" name="telefono_residencial_p[]" placeholder="teléfono Residencial"/>
                            </td>
                        </tr>

                        @endforeach
                    </table>

                   </div>

                    <div class="btn-der">
                        <button id="adicional" name="adicional" disabled type="button" class="btn btn-primary btn-block"> Más + </button>

                    </div>
                </div>

                <div class="p-2 mt-3 shadow-4 p-4" class="formDinamicos" style="background: #e0e0e0">
                    <h4 class="text-center pad-basic no-btm">Programa De Actividades A Desarrollar</h4>
                    <div class="table-responsive">
                        <table class="table"  id="tabla2">

                            @foreach ($proyecto->actividades as $item)

                                <tr class="fila-fija2">
                                    <td>  <textarea disabled class="form-control" name="actividad[]" id="exampleFormControlTextarea1" placeholder="Descripcion" rows="3">{{$item->actividad}}</textarea></td>
                                    <td colspan="2"><input disabled  width="100"   name="tiempo[]" class="form-control" value="{{$item->tiempo}}" placeholder="teléfono Residencial"/></td>
                                    <td class="eliminar "><input disabled type="button" class="btn btn-danger"   value="Menos -"/></td>
                                </tr>

                            @endforeach


                        </table>
                    </div>


                    <div class="btn-der">
                        <button id="adicional2" disabled name="adicional" type="button" class="btn btn-primary btn-block"> Más + </button>

                    </div>
                </div>


                <div class="form-row mt-3">
                    <div class="form-group col-12 col-md-6">
                        <label for="descripcion_producto">Descripción Del Producto</label>
                        <textarea name="descripcion_producto"  class="form-control" disabled id="descripcion_producto" rows="3">{{$proyecto->descripcion_producto}}</textarea>
                        @error('descripcion_producto')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="tiempo_estimado">Tiempo Estimado <small class="text-secondary" >Solo numeros enteros mayores a 1</small></label>
                        <input type="number" value="{{$proyecto->tiempo_estimado}}" disabled    name="tiempo_estimado" class="form-control" id="tiempo_estimado" placeholder="Tiempo Estimado">
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
                                <input class="form-check-input" type="radio"  disabled   name="requiere_docente" id="Si" value="Si" {{ $proyecto->requiere_docente == 'Si' ? 'checked' : ''}} >
                                <label class="form-check-label" for="Si">
                                    Si
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" disabled  name="requiere_docente" id="No" {{ $proyecto->requiere_docente == 'No' ? 'checked' : ''}}   value="No" >
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
                        <input type="text"  disabled  value="{{$proyecto->materiales_requeridos}}"   name="materiales_requeridos" class="form-control" id="materiales_requeridos" placeholder="Materiales Requeridos">
                        @error('materiales_requeridos')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="facilidades">Facilidades Ofrece</label>
                        <input type="text"  value="{{$proyecto->facilidades}}" disabled  name="facilidades" class="form-control" id="facilidades" placeholder="Facilidades Requeridas">
                        @error('facilidades')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="lugar">Lugar</label>
                        <input type="text"  value="{{$proyecto->lugar}}" disabled   name="lugar" class="form-control" id="lugar" placeholder="Lugar">
                        @error('lugar')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="descripcion_lugar">Descripción Del lugar</label>
                        <textarea name="descripcion_lugar"  class="form-control" disabled id="descripcion_lugar" rows="3">{{$proyecto->descripcion_lugar}}</textarea>
                        @error('descripcion_lugar')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                    </div>

                     <div class="form-group col-12 col-md-6">
                        <label for="proponete">Proponete</label>
                        <input type="text"  value="{{$proyecto->proponete}}" disabled  name="proponete" class="form-control" id="proponete" placeholder="Proponente">
                        @error('proponete')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>
                     <div class="form-group col-12 col-md-6">
                        <label for="responsabilidades">Responsable</label>
                        <input type="text"  value="{{$proyecto->responsabilidades}}" disabled  name="responsabilidades" class="form-control" id="responsabilidades" placeholder="Responsable">
                        @error('responsabilidades')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="cedula">Cédula</label>
                        <input type="text"  value="{{$proyecto->cedula}}" disabled   name="cedula" class="form-control" id="cedula" placeholder="Cédula">
                        @error('cedula')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="telefono_oficina">Teléfono De Oficina <small class="text-secondary" >Solo numeros  ejep. ( 3333444 )</small></label>
                        <input type="number" value="{{$proyecto->telefono_oficina}}" disabled  value="{{old('telefono_oficina')}}"  name="telefono_oficina" class="form-control" id="telefono_oficina" placeholder="Teléfono Oficina">
                        @error('telefono_oficina')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="telefono_movil">Teléfono De Movil <small class="text-secondary" >Solo numeros  ejep. ( 33334444 )</small></label>
                        <input type="number"   value="{{$proyecto->telefono_movil}}" disabled  name="telefono_movil" class="form-control" id="telefono_movil" placeholder="Teléfono Movil">
                        @error('telefono_movil')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>
                    <div class="form-group col-12 col-md-6 ">
                        <label for="correo">Correo</label>
                        <input type="text"   value="{{$proyecto->correo}}" disabled  name="correo" class="form-control" id="correo" placeholder="Correo">
                        @error('correo')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 ">
                        <label for="supervisor">Supervisor</label>
                        <input type="text"  value="{{$proyecto->supervisor}}" disabled  name="supervisor" class="form-control" id="supervisor" placeholder="Supervisor">
                        @error('supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6 ">
                        <label for="correo_supervisor">Correo Supervisor</label>
                        <input type="email"  value="{{$proyecto->correo_supervisor}}" disabled  name="correo_supervisor" class="form-control" id="correo_supervisor" placeholder="Correo Supervisor">
                        @error('correo_supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 col-md-6 ">
                        <label for="telefono_oficina_supervisor">Telefono De La Oficina Del Supervisor <small class="text-secondary" >Solo numeros  ejep. ( 3333444 )</small></label>
                        <input type="number"   value="{{$proyecto->telefono_oficina_supervisor}}" disabled   name="telefono_oficina_supervisor" class="form-control" id="telefono_oficina_supervisor" placeholder="Telefono De La Oficina Del Supervisor">
                        @error('telefono_oficina_supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-12 ">
                        <label for="telefono_movil_supervisor">Telefono Movil Del Supervisor <small class="text-secondary" >Solo numeros  ejep. ( 33334444 )</small></label>
                        <input type="number"  value="{{$proyecto->telefono_movil_supervisor}}" disabled  name="telefono_movil_supervisor" class="form-control" id="telefono_movil_supervisor" placeholder="Telefono Movil Del Supervisor">
                        @error('telefono_movil_supervisor')
                        <div class="alert alert-danger mt-1" role="alert">
                            <span>{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                </div>


                <form  method="post" class="confirmarproyecto" action="{{route('proyecto.confirmar',['proyecto'=>$proyecto->id])}}">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Confirmar" class="btn btn-primary mt-3 btn-block"/>
                </form>

                <form  method="post" class="Rechazarproyecto2" action="{{route('proyecto.rechazar',['proyecto'=>$proyecto->id])}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="motivo" name="motivo" >
                    <input type="submit" value="Eliminar"  class="btn btn-danger mt-3 btn-block rechazarproyecto"/>
                </form>


                   <a href="{{route('proyecto.index')}}" value="Regresar" class="btn btn-info mt-3 btn-block">Regresar</a>





        </div>

    </section>



@endsection

@section('scripFinales')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>


    $(function(){
            $('.confirmarproyecto').submit(function (ev) {
                ev.preventDefault();
                Swal.fire({
                    title: 'Esta seguro?',
                    text: "El proyecto pasara de estado pendiente a aceptado!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, aceptar  proyecto!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();

                    }
                    })

        });


        $('.Rechazarproyecto2').submit( async function (ev) {
                ev.preventDefault();
                const { value: email } = await Swal.fire({
                title: 'Rechazar Proyecto',
                input: 'text',
                inputLabel: 'Razon',
                inputPlaceholder: 'Ingrese su razon para rechazar el proyecto'
                })

                console.log(email);
                if (email) {

                   var motivo = document.querySelector('#motivo');
                    motivo.value = email;

                    this.submit();



                }else{



                }

        });





    });


</script>

    <script>




    var confirmar =  document.querySelector('.confirmarproyecto');
        console.log(confirmar);
        confirmar.addEventListener('click',(e)=>{
            e.preventDefault();
            console.log('hola');


        });

        </script>

@endsection
