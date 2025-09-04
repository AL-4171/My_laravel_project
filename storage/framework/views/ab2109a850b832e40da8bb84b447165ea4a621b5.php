<?php $__env->startSection('title'); ?> Show <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card mt-4">
  <div class="card-header">
   Post Info 
  </div> 
  <div class="card-body">
    <h5 class="card-title"> Title: <?php echo e($post['title']); ?></h5>
    <p class="card-text">Description: <?php echo e($post['description']); ?></p>
  </div> 
</div>
  
<div class="card mt-4">
  <div class="card-header">
   Post Creator Info 
  </div> 
  <div class="card-body">
    <h5 class="card-title"> Name: Alaa</h5>
    <p class="card-text">Email: a@gmail.com</p>
    <p class="card-text">Created At: Friday 25-12-2025  10:00:00pm</p>
  </div> 
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\my-laravel-project\resources\views/posts/show.blade.php ENDPATH**/ ?>