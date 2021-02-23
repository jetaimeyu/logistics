
<?php $__env->startSection('title', '重置密码'); ?>
<?php $__env->startSection('content'); ?>
    <div class="offset-md-2 col-md-8">
        <div class="card mt-5">
            <div class="card-header">
                <h5>重置密码</h5>
            </div>
            <div class="card-body">
                <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <div class="alert alert-danger fade show" style="display: none;" id="yc">
                    <button type="button" class="close" aria-label="Close" onclick="$('#yc').hide()">
                        <span aria-hidden="true">×</span></button>
                    <ul class="margin-bottom-none padding-left-lg" id="li1">
                    </ul>
                </div>
                
                <form action="<?php echo e(route('password.resetPassword'), false); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="phone">手机号</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone'), false); ?>">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your phone with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="captcha">图片验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" style="height: 40px;" class="form-control" id="captcha" name="captcha"
                                   value="<?php echo e(old('captcha'), false); ?>">
                            <a href="#" onclick="updateImg()" style="margin-left: 10px;">
                                <img src="<?php echo e(url('captcha/1'), false); ?>" id="captchaImg"/></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="verificationCode">手机验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" style="height: 40px;" class="form-control" id="verificationCode"
                                   name="verificationCode" value="<?php echo e(old('verificationCode'), false); ?>">
                            <button style="margin-left: 10px;" type="button" id="getCodeButton"
                                    onclick="getVerificationCode(this)">
                                获取验证码
                            </button>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" id="password" name="password"
                               value="<?php echo e(old('password'), false); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">重复密码</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation" value="<?php echo e(old('password_confirmation'), false); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("scriptsAfterJs"); ?>
    <script>
        var timeCount = 60;

        function setTime(obj) {
            if (timeCount === 0) {
                obj.attr('disabled', false);
                obj.text('获取验证码');
                timeCount = 60;
                return;
            } else {
                obj.attr('disabled', true);
                obj.text(`(${timeCount}s)后重新获取`);
                timeCount--;
            }
            setTimeout(function () {
                setTime(obj);
            }, 1000);
        }

        function updateImg() {
            var url = "<?php echo e(url('captcha'), false); ?>";
            url += ("/" + Math.random());
            $("#captchaImg").attr('src', url);
        }

        function getVerificationCode(obj) {
            var phone = $("#phone").val()
            var captcha = $("#captcha").val()
            var url = "<?php echo e(route('getVerificationCode'), false); ?>";
            $.ajax({
                type: "get",
                url: url,
                data: {
                    phone: phone,
                    captcha: captcha
                },
                dataType: "JSON",
                success: function (result) {
                    console.log(result)
                    if (result.status == 1) {
                        setTime($("#getCodeButton"))
                    } else {
                        $('.alert').alert()
                        $('#yc').css('display', 'block');
                        $('#li1').html(result.message);
                    }
                }
            })

        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/users/reset.blade.php ENDPATH**/ ?>