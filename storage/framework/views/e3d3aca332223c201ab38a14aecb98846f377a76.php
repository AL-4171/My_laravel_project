<?php $__env->startSection('title'); ?> Edit Post <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-4">
<form method="POST" action="<?php echo e(route('posts.update', 1)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input 
                type="text" 
                name="title" 
                value="<?php echo e(old('title', $post->title)); ?>" 
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea 
                rows="5" 
                name="description" 
                class="form-control"><?php echo e(old('description', $post->description)); ?></textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\my-laravel-project\resources\views/posts/edit.blade.php ENDPATH**/ ?>