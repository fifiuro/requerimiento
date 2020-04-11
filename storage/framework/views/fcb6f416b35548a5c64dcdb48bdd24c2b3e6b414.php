<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR DEPARTAMENTO</h3>
            </div>
            <form role="form" method="POST" action="<?php echo e(url('departamento/buscar')); ?>">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                <input type="text" name="departamento" class="form-control" id="departamento" placeholder="Escriba el Departamento">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                
                                <a href="<?php echo e(url('departamento/nuevo')); ?>" class="btn btn-danger">
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
                                    <th>Departamento</th>
                                    <th>Sigla</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $find; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($f->id_dep); ?></td>
                                    <td><?php echo e($f->departamento); ?></td>
                                    <td><?php echo e($f->sigla); ?></td>
                                    <td>
                                        <?php if($f->estado == 1): ?>
                                            <i class="fas fa-check" style="color:green"></i>
                                        <?php else: ?>
                                            <i class="fas fa-times" style="color:red"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        <a href="<?php echo e(url('departamento/editar/'.$f->id_dep)); ?>" class="btn btn-warning" id="btn1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a href="<?php echo e(url('departamento/confirma/'.$f->id_dep)); ?>" class="btn btn-danger">
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
<?php echo $__env->make('template/base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/requerimiento/resources/views/departamento/buscar.blade.php ENDPATH**/ ?>