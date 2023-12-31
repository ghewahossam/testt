<?php $__env->startSection('title'); ?>
    <title>update user</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between">
        <div class="pagetitle col">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Home</a></li>
                    <li class="breadcrumb-item ">Users</li>
                    <li class="breadcrumb-item active"><a>update user</a></li>
                </ol>
            </nav>
        </div>
        <div>
            <a class="btn btn-primary" href="<?php echo e(route('user_list')); ?>">Back</a>
        </div>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="alert alert-danger mt-1" hidden id="alert-error">

                        </div>
                        <form id="form">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-md-3 col-form-label">name</label>
                                <div class="col-sm-8 col-md-12">
                                    <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" >
                                    <span class="invalid-feedback" id="invalid_feedback_name">
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-md-3 col-form-label"  >email</label>
                                <div class="col-sm-8 col-md-12">
                                    <input type="text" class="form-control" value="<?php echo e($user->email); ?>" name="email" >
                                    <input type="text" class="form-control" name="id" value="<?php echo e($user->id); ?>" hidden >
                                    <span class="invalid-feedback" id="invalid_feedback_email">
                                    </span>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-md-3 col-form-label" >Role</label>
                                <div class="col-sm-8 col-md-12">
                                    <select name="role" class="form-control" id="">

                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  <?php if($role->id == $user->id): ?> selected <?php endif; ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="invalid-feedback" id="invalid_feedback_role">
                                    </span>
                                </div>

                            </div>



                            <div class="text-center">
                                <button class="btn btn-primary" id="btn-save">Update</button>
                                <div class="spinner-border text-primary" role="status" hidden>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src=" https://ajax.googleapis.com/ajax/libs/jQuery/3.3.1/jQuery.min.js "></script>


    <script>
        $('#form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            formData.append('_token', "<?php echo e(csrf_token()); ?>")
            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                url: "<?php echo e(route('user_update_post')); ?>",
                data: formData,
                beforeSend: function() {
                    $('.invalid-feedback').empty()
                    $('#alert-error').attr('hidden', 'hidden')
                    $('#btn-save').attr('hidden', 'hidden')
                    $('.spinner-border').attr('hidden', false)
                },
                complete: function() {
                    $('#btn-save').attr('hidden', false)
                    $('.spinner-border').attr('hidden', 'hidden')
                },
                success: function(data) {
                    if (data.status) {
                        window.location.href = "<?php echo e(route('user_list')); ?>";
                        $('#alert-error').attr('hidden', true)
                    } else {
                        $('.invalid-feedback').css('display', 'none')
                        $('#alert-error').attr('hidden', false)
                        $('#alert-error').empty()
                        $('#alert-error').append( data.message)


                    }
                },
                error: function(xhr) {
                    $('#alert-error').attr('hidden', true)
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#invalid_feedback_' + key).empty()
                        $('#invalid_feedback_' + key).append(value)
                        $('.invalid-feedback').css('display', 'inline')
                    });
                }
            });
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Dashbord.layout.App', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\غوى\clinicians\resources\views/Dashbord/User/edit.blade.php ENDPATH**/ ?>