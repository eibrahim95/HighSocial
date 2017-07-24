<?php $__env->startSection('content'); ?>
            <div class="content">
                <!--
                <div class="title m-b-md">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </div>
                
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                
            </div>
            <div class="col-sm-6">
                <?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('layouts.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>