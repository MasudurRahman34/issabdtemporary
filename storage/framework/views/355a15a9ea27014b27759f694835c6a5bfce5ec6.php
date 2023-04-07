<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Manage Orders
      </div>
      <div class="card-body">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-responsive">
        <table class="table table-hover table-striped" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Order ID</th>
              <th>Orderer Name</th>
              <th>Orderer Phone No</th>
              <th>Date </th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($loop->index + 1); ?></td>
              <td><?php echo e($order->order_gen_id); ?></td>
              <td><?php echo e($order->name); ?></td>
              <td><?php echo e($order->phone_no); ?></td>
              <td><?php echo e(\Carbon\Carbon::parse($order->created_at)->diffForHumans(now())); ?><br/><?php echo e(date('Y-m-d', strtotime($order->created_at))); ?></td>
              <td>
                

                <p>
                  <?php if($order->is_confirm): ?>
                 
                  <button type="button" class="badge badge-primary">গ্রহণ</button>
                  <?php else: ?>
                  <button type="button" class="badge badge-warning">বাতিল</button>
                  <?php endif; ?>
                </p>

                <p>
                  <?php if($order->is_paid): ?>
                  <button type="button" class="badge badge-primary">পরিশোধ</button>
                  <?php else: ?>
                  <button type="button" class="badge badge-danger">বাকী</button>
                  <?php endif; ?>
                </p>
              </td>
              <td>
                

                <a href="<?php echo e(route('admin.order.show', $order->id)); ?>"  class="btn btn-info">দেখুন </a>

                

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo route('admin.order.delete', $order->id); ?>"  method="post">
                          <?php echo e(csrf_field()); ?>

                          <button type="submit" class="btn btn-danger">Permanent Delete</button>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tfoot>
              <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Orderer Name</th>
                <th>Orderer Phone No</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </tfoot>


          </tbody>

        </table>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/backend/pages/orders/index.blade.php ENDPATH**/ ?>