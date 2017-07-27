<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <div class="panel panel-default">
                    <img width="200" height="200" src="<?php echo e($user_additional->profile_pic); ?>">
                <div class="panel-heading"><?php echo e(Auth::user()->name); ?></div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a  href="#gn">General Feed</a></li>
                        <li><a href="#fb">Facebook Feed</a></li>
                        <li><a href="#tw">Twitter Feed</a></li>
                        <li><a href="#in">Instagram Feed</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                    <?php echo $__env->make('layouts.postForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php $__currentLoopData = $user_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('layouts.postView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $fb_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('layouts.postView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($user_posts) == 0 and count($fb_posts) ==0): ?>
                        <div class="panel-body">
                            <br>
                            <p class="lead"> Nothing to view yet ! </p>
                            <br>
                        </div>
                    <?php endif; ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>