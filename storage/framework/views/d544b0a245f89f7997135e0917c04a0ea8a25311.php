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
                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <textarea name="body" id=""  rows="5" class="form-control" placeholder="Enter your post!"></textarea>
                        <?php if($errors->has('body')): ?>
                            <small class="text-danger"><?php echo e($errors->first('body')); ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <select name="category" id="" class="form-control">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <input type="submit" value="Post" class="btn btn-primary btn-block">
                </form>
                    <br>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"><?php echo e($post->body); ?></p>
                            Category: <h5 class="badge badge-secondary"><?php echo e($post->category->name); ?></h5>
                            <br>
                            <h6 class="card-subtitle mb-2 text-muted"> Created by <?php echo e($post->user->name); ?> on <?php echo e($post->created_at); ?></h6>
                            
                            <a href="#" class="card-link" @click="likePost(<?php echo e($post->id); ?>)">Like</a>
                            <a href="#" class="card-link">Comment</a>
                            <a href="<?php echo e(route('post.edit',[$post->id])); ?>" class="card-link">Edit</a>
                            <a href="<?php echo e(route('post.delete',[$post->id])); ?>" class="card-link">Delete</a>
                        </div>
                    </div>
                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <script>
        function likePost(id) {
            var isLike = 1;
            urlLike = '<?php echo e(route('like')); ?>';

            $.ajax({
                method: 'POST',
                url: urlLike,
                data:{ isLike: isLike, post_id: id, }
            }).done( function () {
                
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>