<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap-5.0.2/dist/css/bootstrap.min.css')); ?>">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:200px">
            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column ">
                <h4>Login Admin</h4><hr>
                <form action="<?php echo e(route('auth.check')); ?>" method="post">
                    <?php if(Session::get('fail')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('fail')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo e(old('name')); ?>">
                        <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Leo\Project\Project Real\LPMPS\resources\views/auth/login.blade.php ENDPATH**/ ?>