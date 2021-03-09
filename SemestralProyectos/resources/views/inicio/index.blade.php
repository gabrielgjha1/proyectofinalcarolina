@extends('layouts.app')


@section('content')

<section>



    <div class="container pd-3 shadow-dreamy" style="background: #f2f2f2">
        <h1 class="text-center" >Proyectos aceptados</h1>
        <hr>
        <div class="row">

            @foreach ($proyecto as $item)

            <div class="col-12 col-sm-6 col-md-4">

                <div class="card" >
                    <img class="card-img-top" src="https://utp.ac.pa/sites/default/files/img_0050_1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->titulo}}</h5>
                      <p class="card-text">{{$item->descripcionP}}</p>
                      <p class="card-text" > <b> Encargado: </b>  {{$item->responsabilidades}}</p>
                    </div>

                  </div>
            </div>
            @endforeach



        </div>

        <div class="row mt-5">
            <hr>
            <div class="col-12">

                <div class="alert alert-info">
                    <p  class="alert-link">Si deseas proponer un proyecto da click <a href="{{route('proyecto.create')}}"> aqui </a> </p>
                  </div>

            </div>

        </div>

    </div>

</section>
@endsection


@section('scripFinales')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@if (session('confirmar') == 'ok')

<script>

    Swal.fire(
        'Buen trabajo!',
        'El proyecto ha sido añadido con exito, en caso de ser confirmado llegara a tu correo electronico!',
        'success'
      );

    unset($_SESSION['confirmar']);

</script>


@endif

@endsection
