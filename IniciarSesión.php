<div id="DivInicioSesión" class="modal">
    <form class="modal-content animate myForm" action="" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('DivInicioSesión').style.display='none'" class="CerrarCuadro" title="Close Modal">×</span>
            <img src="assets/img/usuarios-1-1.png" alt="Avatar" class="avatar">
        </div>

        <div id="container-login" class="container">
            <label for="Usuario"><b>Usuario</b></label>
            <input type="text" placeholder="usuario@prog5a*" name="Usuario" required="">
            <br>
            <label for="Contraseña"><b>Contraseña</b></label>
            <input type="password" placeholder="Contraseña (@prog5a!!)*" name="Contraseña" required="">

            <input type="hidden" name="latitude" value="">
            <input type="hidden" name="longitude" value="">

            <input type="submit" name="InicioSesión" value="Iniciar sesión" class="IniciarSesión DecoradoBotón">

            <label>
                <input type="checkbox" checked="checked" name="remember">Recordarme
            </label>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('DivInicioSesión').style.display='none'" class="BotónCancelar DecoradoBotón">Cancel</button>
            <span class="psw">¿Olvidaste tu <a href="#">contraseña</a>?</span>
        </div>
    </form>
</div>