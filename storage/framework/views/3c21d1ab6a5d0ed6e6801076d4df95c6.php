

<?php $__env->startSection('content'); ?>

<div class="card mt-5">
  <h2 class="card-header">Laravel 12 CRUD Example</h2>
  <div class="card-body">

        <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
            <div class="alert alert-success" role="alert"> <?php echo e($value); ?> </div>
        <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary btn-sm" type="button">Dashboard</a>
            <a class="btn btn-success btn-sm" href="<?php echo e(route('products.create')); ?>"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->detail); ?></td>
                    <td>
                        <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">

                            <a class="btn btn-info btn-sm" href="<?php echo e(route('products.show',$product->id)); ?>"><i class="fa-solid fa-list"></i> Show</a>

                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('products.edit',$product->id)); ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            <?php endif; ?>
            </tbody>

        </table>

        <?php echo $products->links(); ?>


  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/products/index.blade.php ENDPATH**/ ?>