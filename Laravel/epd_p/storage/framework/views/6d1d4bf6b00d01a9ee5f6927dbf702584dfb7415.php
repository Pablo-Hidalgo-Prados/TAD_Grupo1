
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
        <?php $__errorArgs = ['telefono'];
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
            <div class="alert alert-danger"> Debe rellenar el teléfono </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['esTrabajador'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar si es trabajador </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['rango'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"> Debe rellenar el rango </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <h1 class="text-center">Personas</h1>
        <table class="table text-white text-center w-75 mx-auto mt-5">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Trabajador</th>
            <th>Gerente</th>
            <th>Borrar</th>
            <th>Editar</th>
            <th>Visualizar</th>
            <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($persona->id); ?></td>
                    <td><?php echo e($persona->nombre); ?></td>
                    <td><?php echo e($persona->apellidos); ?></td>
                    <td><?php echo e($persona->edad); ?></td>
                    <td><?php echo e($persona->esTrabajador); ?></td>
                    <td><?php echo e($persona->esGerente); ?></td>
                    <td>
                        <form action="<?php echo e(route('personas.eliminar', $persona)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('personas.editar', $persona)); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('personas.visualizar', $persona)); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-success" type="submit">Visualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <br>
        <form class="w-50 mx-auto border rounded p-3" action="<?php echo e(route('personas.crear')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label class="h5">Persona:</label>
            <input class="form-control mt-3 mb-3" type="text" name="nombre" placeholder="Nombre">
            <input class="form-control mb-3" type="text" name="apellidos" placeholder="Apellidos">
            <input class="form-control mb-3" type="number" name="edad" placeholder="Edad">
            <br>
            <label class="h5">Trabajador:</label><br>
            <input class="form-check-input me-2" type="radio" name="esTrabajador" value="Trabajador" onclick="addTrabajador()">Sí</input><br>
            <input class="form-check-input me-2" type="radio" name="esTrabajador" value="No Trabajador" onclick="removeTrabajador()">No</input>
            <div id="div_trabajador" class="d-none">
                <input class="form-control mt-2" id="telefono" type="number" name="telefono" placeholder="Teléfono">
                <label class="h5 mt-2">Rango:</label><br>
                <input class="form-check-input me-2" type="radio" name="rango" value="Gerente" onclick="addGerente()">Gerente</input><br>
                <input class="form-check-input me-2" type="radio" name="rango" value="Empleado" onclick="addEmpleado()">Empleado</input><br>
                <input class="form-check-input me-2" type="radio" name="rango" value="Trabajador" onclick="removeDivs()">Ninguno</input>
            </div>
            <br>
            <div id="div_gerente"></div>
            <div id="div_empleado"></div>
            <br>
            <button class="btn btn-success" type="submit">Crear Nueva</button>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.estructura', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\epd_p\resources\views/index.blade.php ENDPATH**/ ?>