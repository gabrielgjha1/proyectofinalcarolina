@extends('layouts.app')

@section('script')

@endsection

@section('content')
<section class="container   ">


    <h1 class="text-center">Propuestas De Proyecto</h1>
    <hr>
    <div class="shadow-dreamy p-3 " style="background: #f2f2f2">

        <table class="table table-striped ">
            <thead class="fondonavar">
              <tr>

                <th class="text-center text-white" scope="col">Información</th>
                <th class="text-center text-white" scope="col">Estado</th>
                <th class="text-center text-white" scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $item)
                <tr>
                    <td class="text-center">

                        <p>Proyecto: <b>{{$item->titulo}}</b> </p>
                        <p>Encargado: <b>{{$item->supervisor}}</b> </p>

                    </td>
                    <td class="text-center"><span class="badge badge-info p-1">{{$item->estado}}</span></td>
                    <td class="text-center"><a href="{{route('proyecto.edit',['proyecto'=>$item->id])}}" class="btn btn-primary" >Abrir</a></td>
                  </tr>
                @endforeach


            </tbody>
          </table>

    </div>

</section>
@endsection

@section('scripFinales')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if (session('rechazar') == 'ok')

<script>

    Swal.fire(
        'Buen trabajo!',
        'El proyecto ha sido rechazado con exito!',
        'success'
      );
      unset($_SESSION['rechazar']);

</script>


@endif

@if (session('confirmar') == 'ok')

<script>

    Swal.fire(
        'Buen trabajo!',
        'El proyecto ha sido aprobado  con exito!',
        'success'
      );

    unset($_SESSION['confirmar']);

</script>


@endif

@endsection
