
<div class="container-fluid " style="min-height:80vh; margin-top:50px;">
    <div calass="container-fluid" stylre="margin:50px;">
    <form action="nuevousuario" method="post" id="nuevousuario">
        <div class="container">
            <div class="row">
                <div class="col-6 align-self-center">
                    <input class="form-control" type="text" placeholder="Nombre" aria-label="Nombre" id="nombre" name="nombre" required>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-6 align-self-center">
                    <input class="form-control" type="text" placeholder="correo@ejemplo.com" aria-label="correo" id="email" name="email" required>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-6 align-self-center">
                    <select class="form-select" aria-label="Seleccione un Genero" id="genero" name="genero">
                        <option selected>Seleccione un Genero</option>
                        <option value="male">Hombre</option>
                        <option value="female">Mujer</option>
                    </select>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-6 align-self-center">
                    <select class="form-select" aria-label="Seleccione un estado de actividad" id="activo" name="activo">
                            <option selected>true</option>
                            <option value="active">true</option>
                            <option value="inactive">false</option>
                    </select>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-6 align-self-center">
                    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                </div>
            </div>
        </div>
    </div>
</div>