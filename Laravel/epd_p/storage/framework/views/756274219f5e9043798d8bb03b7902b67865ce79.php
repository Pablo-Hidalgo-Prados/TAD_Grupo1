
<?php $__env->startSection('contenidoPrincipal'); ?>
        <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar el nombre </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar los apellidos </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['edad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar la edad </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['telefonos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar el teléfono </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['salario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar el salario </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['precioPorHora'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar el precio por hora </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['horasTrabajadas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar el horas trabajadas </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="w-50 border rounded p-3 mx-auto">
            <h1>Editar <?php echo e($rango); ?></h1>
            <form action="<?php echo e(route('personas.actualizar',$persona->id)); ?>" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <label>Nombre:</label>
                <input type="hidden" value="<?php echo e($rango); ?>" name="rango">
                <input class="form-control mb-3" type="text" value="<?php echo e($persona->nombre); ?>" name="nombre">
                <label>Apellidos:</label>
                <input class="form-control mb-3" type="text" value="<?php echo e($persona->apellidos); ?>" name="apellidos">
                <label>Edad:</label>
                <input class="form-control mb-3" type="number" value="<?php echo e($persona->edad); ?>" name="edad">
                <?php if($rango==='trabajador' || $rango==='empleado' || $rango==='gerente'): ?>
                <div id="div_trabajador">
                    <label id="l_telefono">Teléfono:</label>
                    <input id="telefono" class="form-control mb-3" type="number" value="<?php echo e($persona->telefonos); ?>" name="telefonos">
                        <?php if($rango==='trabajador'): ?>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" onclick="camposGerente('<?php echo e($rango); ?>')">Gerente</input><br>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" onclick="camposEmpleado('<?php echo e($rango); ?>')">Empleado</input><br>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" checked onclick="camposTrabajador('<?php echo e($rango); ?>')">Trabajador</input><br>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" onclick="ocultaInputs()">Persona</input><br>
                        <?php endif; ?>
                </div>
                <?php else: ?>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" onclick="camposGerente('<?php echo e($rango); ?>')">Gerente</input><br>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" onclick="camposEmpleado('<?php echo e($rango); ?>')">Empleado</input><br>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" onclick="camposTrabajador('<?php echo e($rango); ?>')">Trabajador</input><br>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" checked onclick="ocultaInputs()">Persona</input><br>
                <?php endif; ?>
                <?php if($rango==='empleado'): ?>
                <div id="div_empleado">
                    <label id="l_precioPorHora">Precio por hora:</label>
                    <input id="precioPorHora" class="form-control mb-3" type="number" value="<?php echo e($persona->precioPorHora); ?>" name="precioPorHora">
                    <label id="l_horasTrabajadas">Horas trabajadas:</label>
                    <input if="horasTrabajadas" class="form-control mb-3" type="number" value="<?php echo e($persona->horasTrabajadas); ?>" name="horasTrabajadas">
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" onclick="camposGerente('<?php echo e($rango); ?>')">Gerente</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" checked onclick="camposEmpleado('<?php echo e($rango); ?>')">Empleado</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" onclick="camposTrabajador('<?php echo e($rango); ?>')">Trabajador</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" onclick="ocultaInputs()">Persona</input><br>
                </div>
                <?php elseif($rango==='gerente'): ?>
                <div id="div_gerente">
                    <label id="l_salario">Salario:</label>
                    <input id="salario" class="form-control mb-3" type="number" value="<?php echo e($persona->salario); ?>" name="salario">
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" checked onclick="camposGerente('<?php echo e($rango); ?>')">Gerente</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" onclick="camposEmpleado('<?php echo e($rango); ?>')">Empleado</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" onclick="camposTrabajador('<?php echo e($rango); ?>')">Trabajador</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" onclick="ocultaInputs()">Persona</input><br>
                </div>
                <?php endif; ?>
                <div id="campos_nuevos"></div>
                <button class="btn btn-success mt-3" type="submit">Editar</button>
            </form>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.estructura', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\epd_p\resources\views/editar.blade.php ENDPATH**/ ?>