<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(Session::get('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
            <div class="col-sm-6">
                <div class="well">
                    <form action="" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label for="category-name">Category</label>
                            <input type="text" id="category-name" name="name" class="form-control">
                            <?php if($errors->has('name')): ?>
                                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Create Category">
                    </form>
                </div>
            </div>
        <div class="col-sm-6">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-body">
                       <?php echo e($category->name); ?>

                    </div>
                    <h6 class="card-subtitle mb-2 ml-3 mt-2 text-muted">Created by <?php echo e($category->user->name); ?></h6>
                </div>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>