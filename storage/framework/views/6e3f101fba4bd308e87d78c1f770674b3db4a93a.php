<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('post.update',['id' => $post->id])); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <textarea name="body" id="post-body"  rows="5" class="form-control" ><?php echo e($post->body); ?></textarea>
                    
                    <?php if($errors->has('body')): ?>
                        <small class="text-danger"><?php echo e($errors->first('body')); ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <select name="category" id="" class="form-control">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $post->category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="submit" value="Post" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>