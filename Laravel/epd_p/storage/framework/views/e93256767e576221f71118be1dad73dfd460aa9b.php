<html>
<head>
        <title>Personas</title>
        <link rel="icon" type="image/x-icon" href="/images/icono.png">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js', 'resources/css/app.scss']); ?>
        <script>
            function addTrabajador(){
                var div_trabajador = document.getElementById('div_trabajador');
                div_trabajador.classList.remove('d-none');
            }

            function removeTrabajador(){
                var div_trabajador = document.getElementById('div_trabajador');
                div_trabajador.classList.add('d-none');
            }

            function addGerente(){
                var esTrabajador = document.getElementById('div_trabajador').firstChild;
                if(esTrabajador!=null){
                    var div_empleado = document.getElementById('div_empleado');
                    while(div_empleado.firstChild){
                        div_empleado.removeChild(div_empleado.firstChild);
                    }
                    var div_gerente = document.getElementById('div_gerente');
                    if(div_gerente.textContent!=null){
                        div_gerente.textContent="";
                    }
                    var input = document.createElement('input');
                    input.type = "float";
                    input.name="salario";
                    input.placeholder="Salario";
                    input.id="salario";
                    input.classList.add('form-control');
                    input.classList.add('mt-2');
                    div_gerente.appendChild(input);
                }
            }

            function addEmpleado(){
                var esTrabajador = document.getElementById('div_trabajador').firstChild;
                if(esTrabajador!=null){
                    var div_gerente = document.getElementById('div_gerente');
                    while(div_gerente.firstChild){
                        div_gerente.removeChild(div_gerente.firstChild);
                    }
                    var div_empleado = document.getElementById('div_empleado');
                    if(div_empleado.textContent!=null){
                        div_empleado.textContent="";
                    }
                    var input_precio = document.createElement('input');
                    input_precio.type = "number";
                    input_precio.name="precioPorHora";
                    input_precio.placeholder="Precio por hora";
                    input_precio.id="precioPorHora";
                    input_precio.classList.add('form-control');
                    input_precio.classList.add('mt-2');
                    div_empleado.appendChild(input_precio);
                    var input_horas = document.createElement('input');
                    input_horas.type = "number";
                    input_horas.name="horasTrabajadas";
                    input_horas.placeholder="Horas Trabajadas";
                    input_horas.id="horasTrabajadas";
                    input_horas.classList.add('form-control');
                    input_horas.classList.add('mt-2');
                    div_empleado.appendChild(input_horas);
                }
            }

            function removeDivs(){
                var div_gerente = document.getElementById('div_gerente');
                while(div_gerente.firstChild){
                    div_gerente.removeChild(div_gerente.firstChild);
                }
                var div_empleado = document.getElementById('div_empleado');
                while(div_empleado.firstChild){
                    div_empleado.removeChild(div_empleado.firstChild);
                }
            }

            function ocultaInputs(){
                var campos_nuevos = document.getElementById('campos_nuevos');
                while (campos_nuevos.firstChild) {
                    campos_nuevos.removeChild(campos_nuevos.firstChild);
                }
            }

            function camposTrabajador(rango){
                ocultaInputs();
                if(rango!='trabajador' && rango!='gerente' && rango!='empleado'){
                    var campos_nuevos = document.getElementById('campos_nuevos');
                    var label = document.createElement('label');
                    var text = document.createTextNode('Telefono:');
                    label.appendChild(text);
                    campos_nuevos.appendChild(label);
                    campos_nuevos.appendChild(document.createElement('br'));
                    var input = document.createElement('input');
                    input.type = "number";
                    input.name="telefonos";
                    input.placeholder="Telefono";
                    input.id="telefonos";
                    input.classList.add('form-control');
                    input.classList.add('mt-2');
                    campos_nuevos.appendChild(input);
                }
            }

            function camposGerente(rango){
                ocultaInputs();
                if(rango!='gerente'){
                    if(rango=='persona'){
                        camposTrabajador(rango);
                    }
                    var campos_nuevos = document.getElementById('campos_nuevos');
                    var label = document.createElement('label');
                    var text = document.createTextNode('Salario:');
                    label.appendChild(text);
                    campos_nuevos.appendChild(label);
                    campos_nuevos.appendChild(document.createElement('br'));
                    var input = document.createElement('input');
                    input.type = "number";
                    input.name="salario";
                    input.placeholder="Salario";
                    input.id="salario";
                    input.classList.add('form-control');
                    input.classList.add('mt-2');
                    campos_nuevos.appendChild(input);
                }
            }

            function camposEmpleado(rango){
                ocultaInputs();
                if(rango!='empleado'){
                    if(rango=='persona'){
                        camposTrabajador(rango);
                    }
                    var campos_nuevos = document.getElementById('campos_nuevos');
                    var label = document.createElement('label');
                    var text = document.createTextNode('Precio por hora:');
                    label.appendChild(text);
                    campos_nuevos.appendChild(label);
                    campos_nuevos.appendChild(document.createElement('br'));
                    var ph = document.createElement('input');
                    ph.type = "number";
                    ph.name="precioPorHora";
                    ph.placeholder="Precio por hora";
                    ph.id="precioPorHora";
                    ph.classList.add('form-control');
                    ph.classList.add('mt-2');
                    campos_nuevos.appendChild(ph);
                    var label2 = document.createElement('label');
                    var text2 = document.createTextNode('Horas trabajadas:');
                    label2.appendChild(text2);
                    campos_nuevos.appendChild(label2);
                    campos_nuevos.appendChild(document.createElement('br'));
                    var ht = document.createElement('input');
                    ht.type = "number";
                    ht.name="horasTrabajadas";
                    ht.placeholder="Precio por hora";
                    ht.id="horasTrabajadas";
                    ht.classList.add('form-control');
                    ht.classList.add('mt-2');
                    campos_nuevos.appendChild(ht);
                }
            }

        </script>
    </head>
    <body class="bg-dark text-white">
        <main class="m-3">
            <?php echo $__env->yieldContent('contenidoPrincipal'); ?>
        </main>
    </body>
</html><?php /**PATH C:\xampp\htdocs\epd_p\resources\views/layouts/estructura.blade.php ENDPATH**/ ?>