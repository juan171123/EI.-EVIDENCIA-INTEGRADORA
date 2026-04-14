@if($errors->any())

    <div id="errors" class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-xmark"></i>    
        <strong class="mx-2">¡Error!</strong> Todos los campos son obligatorios.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function(){
            //declarar variable para obtener el elemento de alerta
            let alerta2 = document.getElementById('errors')

            //validar si la alerta existe
            if(alerta2){
                //quitar la clase show de listado de clases en el elemento
                alerta2.classList.remove('show');
                //agregar animacion
                alerta2.classList.add('fade');
                //eliminar el elemento del documento(DOM)
                setTimeout(() => alerta2.remove(), 500);
            }
        }, 3000)
    </script>
@endif