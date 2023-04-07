<?php $__env->startSection('content'); ?>
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Sliders
        </div>
        <div class="card-body">
            <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <a href="#addSliderModal" data-bs-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New Slider
            </a>
            <div class="clearfix"></div>

            
            <!-- Add Modal -->
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new slider</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="<?php echo route('admin.slider.store'); ?>"  method="post" enctype="multipart/form-data">

                      <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label for="title">Slider Title <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required>
                      </div>

                      <div class="form-group">
                        <label for="image">Slider Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Slider Image" required>
                      </div>

                      <div class="form-group">
                        <label for="button_text">Slider Button Text <small class="text-info">(optional)</small></label>
                        <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (if need)">
                      </div>

                      <div class="form-group">
                        <label for="button_link">Slider Button Link <small class="text-info">(optional)</small></label>
                        <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Text (if need)">
                      </div>

                      <div class="form-group">
                        <label for="priority">Slider Priority <small class="text-info">(required)</small></label>
                        <input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority; e.g: 10" value="10" required>
                      </div>

                      <button type="submit" class="btn btn-success">Add New</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>


          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Slider Title</th>
              <th>Slider Image</th>
              <th>Slider Priority</th>
              <th>Action</th>
            </tr>

            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->index+1); ?></td>
                <td><?php echo e($slider->title); ?></td>
                <td>
                  <img src="<?php echo e(asset('images/sliders/'.$slider->image)); ?>" width="40">
                </td>
                <td><?php echo e($slider->priority); ?></td>

                <td>
                  <a href="#editModal<?php echo e($slider->id); ?>" data-bs-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal<?php echo e($slider->id); ?>" data-bs-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal<?php echo e($slider->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo route('admin.slider.delete', $slider->id); ?>"  method="post">
                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal<?php echo e($slider->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo route('admin.slider.update', $slider->id); ?>"  method="post" enctype="multipart/form-data">

                          <?php echo e(csrf_field()); ?>

                          <div class="form-group">
                            <label for="title">Slider Title <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required value="<?php echo e($slider->title); ?>">
                          </div>

                          <div class="form-group">
                            <label for="image">Slider Image 
                              <a href="<?php echo e(asset('images/sliders/'.$slider->image)); ?>" target="_blank">
                                Previous Image
                              </a>

                              <small class="text-danger">(required)</small></label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Slider Image">
                          </div>

                          <div class="form-group">
                            <label for="button_text">Slider Button Text <small class="text-info">(optional)</small></label>
                            <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (if need)"  value="<?php echo e($slider->button_text); ?>">
                          </div>

                          <div class="form-group">
                            <label for="button_link">Slider Button Link <small class="text-info">(optional)</small></label>
                            <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Text (if need)"  value="<?php echo e($slider->button_link); ?>">
                          </div>

                          <div class="form-group">
                            <label for="priority">Slider Priority <small class="text-info">(required)</small></label>
                            <input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority; e.g: 10" required  value="<?php echo e($slider->priority); ?>">
                          </div>

                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                        </form>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/backend/pages/sliders/index.blade.php ENDPATH**/ ?>