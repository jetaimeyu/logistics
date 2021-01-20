<?php $__env->startSection('title', '文件上传'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('upload'), false); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="file"></label>
            <input type="file" name="file" id="file" value="<?php echo e(old('file'), false); ?>" onchange="uploadImage()">
        </div>
        <button class="btn-primary btn" type="submit">submit</button>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptsAfterJs'); ?>
    <script>
        var uploadImage=()=>{
            let formData = new FormData();
            var file = document.querySelector('#file');
            formData.append("file", file.files[0]);
            axios.post('<?php echo e(route('upload'), false); ?>', formData, {
                headers:{
                    "Content-Type":"multipart/form-data"
                }
            }).then((result)=>{
                console.log(result)
            })
        };
        $(function (){
           console.log(2)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/pages/upload.blade.php ENDPATH**/ ?>