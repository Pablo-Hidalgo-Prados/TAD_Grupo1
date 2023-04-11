
<?php $__env->startSection('contenidoPrincipal'); ?>
            <div class="w-50 border rounded p-3 mx-auto">
                <h3 class="text-center">Editar a <?php echo e($persona->nombre); ?></h3>
                <form action="<?php echo e(route('personas.volver')); ?>" method="get">
                    <label>Nombre:</label>
                    <input type="hidden" disabled value="<?php echo e($rango); ?>" name="rango">
                    <input class="form-control mb-3" type="text" disabled value="<?php echo e($persona->nombre); ?>" name="nombre">
                    <label>Apellidos:</label>
                    <input class="form-control mb-3" type="text" disabled value="<?php echo e($persona->apellidos); ?>" name="apellidos">
                    <label>Edad:</label>
                    <input class="form-control mb-3" type="integer" disabled value="<?php echo e($persona->edad); ?>" name="edad">
                    <?php if($rango==='trabajador' || $rango==='empleado' || $rango==='gerente'): ?>
                    <label>Teléfono:</label>
                    <input class="form-control mb-3" type="integer" disabled value="<?php echo e($persona->telefonos); ?>" name="telefonos">
                    <?php endif; ?>
                    <?php if($rango==='empleado'): ?>
                    <label>Precio por hora:</label>
                    <input class="form-control mb-3" type="float" disabled value="<?php echo e($persona->precioPorHora); ?>" name="precioPorHora">
                    <label>Horas trabajadas:</label>
                    <input class="form-control mb-3" type="float" disabled value="<?php echo e($persona->horasTrabajadas); ?>" name="horasTrabajadas">
                    <label>Debe pagar impuestos:</label>
                    <input class="form-control mb-3" type="float" disabled value="<?php echo e($persona->debePagarImpuestos); ?>" name="debePagarImpuestos">
                    <label>Calcular sueldo:</label>
                    <input class="form-control mb-3" type="float" disabled value="<?php echo e($persona->calcularSueldo); ?>" name="calcularSueldo">
                    <?php elseif($rango==='gerente'): ?>
                    <label>Salario:</label>
                    <input class="form-control mb-3" type="text" disabled value="<?php echo e($persona->salario); ?>" name="salario">
                    <label>Debe pagar impuestos:</label>
                    <input class="form-control mb-3" type="float" disabled value="<?php echo e($persona->debePagarImpuestos); ?>" name="debePagarImpuestos">
                    <label>Calcular sueldo:</label>
                    <input class="form-control mb-3" type="float" disabled value="<?php echo e($persona->calcularSueldo); ?>" name="calcularSueldo">
                    <?php endif; ?>
                    <button class="btn btn-success" type="submit">Volver</button>
                </form>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.estructura', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\epd_p\resources\views/visualizar.blade.php ENDPATH**/ ?>