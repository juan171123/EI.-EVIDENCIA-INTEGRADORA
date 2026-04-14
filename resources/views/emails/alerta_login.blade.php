<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

        .container{
            font-family:Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        .content{
            background: #ffff;
            padding: 20px;
            border-radius: 10px;
        }
        .btn{
            background: blue;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 7px;
        }

    </style>
</head>
<body>

    <center>
        <div class="container">
            <div class="content">
                <a href="https://mx.pinterest.com/pin/132152570312669800/">
                    <img src="https://i.pinimg.com/736x/a9/98/a5/a998a56c8af6cfb48b42b095d053d082.jpg" alt="Imagen de alerta" width="100" height="100">
                </a>
                
                <h1>Nuevo inicio de sesion :O</h1>
                <p>Se ha detectado nueva actividad en la cuenta</p>

                <a href="{{ route('acceso') }}" class="btn" style="color:white">
                    Verificar inicio de sesion
                </a>

                <p>Si no fuiste tú, solicita un cambio de contraseña <br>
                    al administrador del sistema.
                </p>

            </div>
        </div>
    </center>
    
</body>
</html>