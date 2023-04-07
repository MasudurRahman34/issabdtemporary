<style>
  .input-group-text{
    font-size: .8rem !important;
  }
</style>
<?php $__env->startSection('content'); ?>
  <div class="main-panel">
    <div class="content-wrapper">
<div class="row">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Edit Product
          </div>
          <div class="card-body">
            <form action="<?php echo e(route('admin.product.update', $product->id)); ?>" method="post" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($product->title); ?>" >
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" rows="8" cols="80" class="form-control"><?php echo e($product->description); ?></textarea>

              </div>
              
              
              <div class="form-group">
                <label for="exampleInputEmail1">Select Category</label>
                <select class="form-control" name="category_id">
                  <option value="">Please select a category for the product</option>
                  <?php $__currentLoopData = App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($parent->id); ?>" <?php echo e($parent->id == $product->category->id ? 'selected': ''); ?>><?php echo e($parent->name); ?></option>

                    <?php $__currentLoopData = App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($child->id); ?>"  <?php echo e($child->id == $product->category->id ? 'selected': ''); ?>><?php echo e($child->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
             
              <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            update Product Image
          </div>
        </div>
        <div class="card-body">
          <form action="">
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Image</button>
          </form>
        </div>
        
      </div>
      <div class="col-md-12">
          <div class="table-responsive">
        <table class="table table-hover table-striped"  id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              
              <th>Active status</th>
              <th>offer type</th>
              <th>price</th>
              <th>unit</th>
              <th>discount</th>
              <th>target_quantity</th>
              <th>end date</th>
              <th>deliver date</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $product->EventProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>#</td>
              <td><?php echo e($event->is_active==1 ?'True':'False'); ?></td>
              <td><?php echo e($event->offer_type); ?></td>
              <td><?php echo e($event->product_price); ?></td>
              <td><?php echo e($event->Units->name); ?></td>
              <td><?php echo e($event->discount); ?></td>
              <td><?php echo e($event->target_quantity); ?></td>
              <td><?php echo e($event->end_date); ?></td>
              <td><?php echo e($event->delivery_date); ?></td>
              <td>
                <a href="<?php echo e(route('admin.event.product.edit', $event->id)); ?>" class="badge bg-success btn-sm text-light">Edit</a>
                <a href="#deleteModal<?php echo e($event->id); ?>" data-toggle="modal" class="badge bg-danger btn-sm text-light">Delete</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Product Published To
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo e(route('admin.event.product.store', $product->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Offer Type</label>
                    <select name="offer_type" id="offer_type" class="form-select" id="inputGroupSelect01">
                      <option value=0>None</option>
                      <option value=1>Group Discount</option>
                      <option value=2>Daily discount</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">target_quantity</span>
                    <input type="number" class="form-control" name="target_quantity" id="target_quantity" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="number" class="form-control" value="0" name="product_price" id="product_price" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Unit</label>
                    <select name="unit_id" id="unit_id" class="form-select" id="inputGroupSelect01">
                      <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($unit->uom); ?>"><?php echo e($unit->name); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Discount</span>
                    <input type="number" class="form-control" name="discount" id="discount" value="0" min="0" max="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Price after Discount</span>
                    <input type="number" class="form-control" name="price_after_discount" id="price_after_discount" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                    <input type="datetime-local" value="<?php echo e(now()); ?>" class="form-control" name="start_date" id="start_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    <input type="datetime-local" class="form-control" name="end_date" id="end_date" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Deliver Date</span>
                    <input type="datetime-local" class="form-control" name="deliver_date" id="deliver_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Active status</label>
                    <select name="is_active" id="is_active" class="form-select" id="inputGroupSelect01">
                      <option value="1">True</option>
                      <option value="0">False</option>
                    </select>
                  </div>
                </div>
                
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Event Product</button>
          </form>
        </div>
      </div>
  </div>
</div>
</div>
  <!-- main-panel ends -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script>
     $("#product_price, #unit_id, #discount").on('focus change keydown keyup click',function(){
        var price_after_discount = (Number($("#product_price").val()) * Number($('#unit_id').val())) - Number($('#discount').val());
       $('#price_after_discount').val(price_after_discount);
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/backend/pages/product/edit.blade.php ENDPATH**/ ?>