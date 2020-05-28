<form class="layui-form" method="POST" action="{{ url({'for':'web.account.verify_login'}) }}">
    <div class="layui-form-item">
        <label class="layui-form-label"><i class="layui-icon layui-icon-username"></i></label>
        <div class="layui-input-block">
            <input id="cv-account" class="layui-input" type="text" name="account" autocomplete="off" placeholder="手机 / 邮箱" lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"><i class="layui-icon layui-icon-vercode"></i></label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="verify_code" placeholder="验证码" lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"><i class="layui-icon layui-icon-vercode"></i></label>
        <div class="layui-input-block">
            <span id="cv-captcha-btn" class="layui-btn layui-btn-primary layui-btn-fluid" data-app-id="{{ captcha.app_id }}">点击完成验证</span>
            <span id="cv-verify-btn" class="verify-btn layui-btn layui-btn-primary layui-btn-disabled layui-btn-fluid layui-hide"><i class="layui-icon layui-icon-ok"></i>验证成功</span>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button id="cv-submit-btn" class="layui-btn layui-btn-fluid" disabled="disabled" lay-submit="true" lay-filter="go">立即登录</button>
            <input type="hidden" name="return_url" value="{{ return_url }}">
        </div>
    </div>
</form>