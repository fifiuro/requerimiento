<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR AREA</h3>
            </div>
            <form role="form" method="POST" action="<?php echo e(url('area/buscar')); ?>">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" name="area" class="form-control" id="area" placeholder="Escriba el Area">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                
                                <a href="<?php echo e(url('area/nuevo')); ?>" class="btn btn-danger">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if(isset($estado)): ?>
        <?php if($estado == 1): ?>
            <div class="row">
                <div class="card card-info col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">Resultado de la busqueda</h3>
                    </div>
                    
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Area</th>
                                    <th>Estado</th>
                                    <th>Lista</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $find; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($f->id_are); ?></td>
                                    <td><?php echo e($f->tipo); ?></td>
                                    <td>
                                        <?php if($f->estado == 1): ?>
                                            <i class="fas fa-check" style="color:green"></i>
                                        <?php else: ?>
                                            <i class="fas fa-times" style="color:red"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('cargo/buscar/'.$f->id_are)); ?>">Ver Cargos</a>
                                    </td>
                                    <td>
                                        
                                        <a href="<?php echo e(url('area/editar/'.$f->id_are)); ?>" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a href="<?php echo e(url('area/confirma/'.$f->id_are)); ?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php elseif($estado == 0): ?>
            <div class="row">
                <div class="card card-info col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">Resultado de la busqueda</h3>
                    </div>
                    <div class="card-body p-0">
                        <h3><?php echo e($mensaje); ?></h3>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/requerimiento/resources/views/area/buscar.blade.php ENDPATH**/ ?>