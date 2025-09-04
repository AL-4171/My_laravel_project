<?php $__env->startSection('title'); ?> Create Post <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form  method="POST" action="<?php echo e(route('posts.store')); ?>" >
    <?php echo csrf_field(); ?>
 <div class="mb-3">
 <label class="form-label">Title</label>
 <input type="text" name="title" class="form-control">   
 </div>  
 
 <div class="mb-3">
 <label class="form-label">Description</label>
 <textarea rows="15" name="description" class="form-control">  </textarea> 
 </div>  

 <div class="mb-3">
 <label class="form-label">Post Creator</label>
 <select name="post_creator" class="form-control">
  <option value="1">Alaa</option>
  <option value="2">A</option>  
 </select>   
 </div>  
 <button class="btn btn-success">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\my-laravel-project\resources\views/posts/create.blade.php ENDPATH**/ ?>