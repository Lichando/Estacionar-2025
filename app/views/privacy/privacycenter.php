<!DOCTYPE html>
<html lang="en">
<head>
    <?=$head?>
    <title><?=$title?></title>
</head>
<body>
    
    <div class="grid text-center" style="height: 100vh;">
        <div class="row" style="height: 100%; margin: 0;">
            <div class="col-12 col-md-3 p-0" style="height: 100%;">
                <aside class="d-flex flex-column justify-content-evenly bg-primary text-white p-2 border-start-0 rounded-end" style="height: 100%;">
                    <a href="../home" class="h2 text-white text-capitalize text-decoration-none">EstacionApp</a>
                    <a href="#politicas" class="m-3 text-white text-capitalize text-decoration-none"><i class="bi bi-shield-lock"></i> politicas</a>
                    <a href="#normas" class="m-3 text-white text-capitalize text-decoration-none"><i class="bi bi-file-earmark-text"></i> normas</a>
                    <a href="#manual" class="m-3 text-white text-capitalize text-decoration-none"><i class="bi bi-book"></i> manual</a>
                    <a href="#nosotros" class="m-3 text-white text-capitalize text-decoration-none"><i class="bi bi-people"></i> nosotros</a>
                    <a href="#descargas" class="m-3 text-white text-capitalize text-decoration-none"><i class="bi bi-download"></i> descargas</a>
                </aside>
            </div>
            


            <!-- Aca van las secciones -->
            <div class="col-12 col-md-9 p-0" style="height: 100%; overflow-y: auto;">
                <section id="politicas" class="content bg-light p-4">
                    <h2>1. Políticas de uso</h2>
                    <p class="lh-1">Nuestra aplicación tiene como objetivo facilitar el alquiler y la gestión de cocheras. 
                    A continuación, se presentan nuestras políticas principales:</p>
                    <p><strong>1:</strong> El usuario debe proporcionar información verídica durante el registro.</p>
                    <p><strong>2:</strong> Queda prohibido el uso de la app para actividades ilegales.</p>
                    <p><strong>3:</strong> La seguridad de los datos es nuestra prioridad; manejamos tu información siguiendo altos estándares.</p>
                    <hr>
                </section>
                <section id="normas" class="content bg-light p-4">
                    <h3>2. Normas Generales</h3>
                    <p class="lh-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eos officiis sapiente odit earum fugiat.
                        Voluptatibus provident vero at corporis incidunt explicabo saepe, modi optio distinctio sunt repellendus
                        vitae rem?</p>
                    <p><strong>1:</strong> ¿....?</p>
                    <p><strong>2:</strong> ¿...?</p>
                    <p><strong>3:</strong> ¿...?</p>
                    <hr>
                </section>
                <section id="manual" class="content bg-light p-4">
                    <h3>3. Manual de usuario</h3>
                    <p class="lh-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eos officiis sapiente odit earum fugiat.
                        Voluptatibus provident vero at corporis incidunt explicabo saepe, modi optio distinctio sunt repellendus
                        vitae rem?</p>
                    <p><strong>1:</strong> ¿....?</p>
                    <p><strong>2:</strong> ¿...?</p>
                    <p><strong>3:</strong> ¿...?</p>
                    <hr>
                </section>
                <section id="nosotros" class="content bg-light p-4">
                    <h3>4. Sobre nosotros</h3>
                    <p class="lh-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eos officiis sapiente odit earum fugiat.
                        Voluptatibus provident vero at corporis incidunt explicabo saepe, modi optio distinctio sunt repellendus
                        vitae rem?</p>
                    <p><strong>1:</strong> ¿....?</p>
                    <p><strong>2:</strong> ¿...?</p>
                    <p><strong>3:</strong> ¿...?</p>
                    <hr>
                </section>
                <section id="descargas" class="content bg-light p-4">
                    <h3>5. Manual de Usuario</h3>
                    <p> Este espacio esta reservado para que el usuario pueda descargar el manual de usuario en un documento
                        y leerlo desde su dispositivo.
                    </p>
                    <a href="" download="manual/user_manual.docx"
                        class="btn btn-outline-primary text-decoration-none d-block mx-auto mt-4"
                        style="max-width: 200px;">Descargar PDF</a>
                </section>
            </div>
            
        </div>
    </div>    
</body>
</html>