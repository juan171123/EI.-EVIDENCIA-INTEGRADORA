@if(session('success'))

    <div id="alert" class="alert alert-success alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-check"></i>    
        <strong class="mx-2">¡Éxito!</strong>{{ session('success') }}
        <button type="buton" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function(){
            //declarar variable para obtener el elemento de alerta
            let alerta = document.getElementById('alert')

            //validar si la alerta existe
            if(alerta){
                //quitar la clase show de listado de clases en el elemento
                alerta.classList.remove('show');
                //agregar animacion
                alerta.classList.add('fade');
                //eliminar el elemento del documento(DOM)
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000)
    </script>
@endif

@if(session('warning'))
    <div id="alert-warning" class="alert alert-warning alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <strong class="mx-2">¡Advertencia!</strong>{{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <script>
        setTimeout(function(){
            let alerta3 = document.getElementById('alert-warning')
            if(alerta3){ alerta3.classList.remove('show'); alerta3.classList.add('fade'); setTimeout(() => alerta3.remove(), 500); }
        }, 3000)
    </script>
@endif

@if(session('error'))
    <div id="alert-error" class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-xmark"></i>
        <strong class="mx-2">¡Error!</strong>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <script>
        setTimeout(function(){
            let alerta = document.getElementById('alert-error')
            if(alerta){ alerta.classList.remove('show'); alerta.classList.add('fade'); setTimeout(() => alerta.remove(), 500); }
        }, 3000)
    </script>
@endif




