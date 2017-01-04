<div class="form-group">
    <label for="name" class="col-md-3 control-label">
        姓名
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name" id="name" value="{{ $name }}">
    </div>
</div>
<div class="form-group">
    <label for="gender" class="col-md-3 control-label">
        性别
    </label>
    <div class="col-md-7">
        <label class="radio-inline">
            <input type="radio" name="gender" id="gender" value="男">
            男
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender"  id="gender" checked="checked" value="女">
            女
        </label>
    </div>
</div>
<div class="form-group">
    <label for="full_time" class="col-md-3 control-label">
        状态
    </label>
    <div class="col-md-7">
        <label class="radio-inline">
            <input type="radio" name="full_time" id="full_time"  checked="checked" value="1">
            全职
        </label>
        <label class="radio-inline">
            <input type="radio" name="full_time"  id="full_time" checked="checked" value="0">
            兼职
        </label>
    </div>
</div>
<div class="form-group">
    <label for="telephone" class="col-md-3 control-label">
        手机号码
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="telephone" id="telephone" value="{{ $telephone }}">
    </div>
</div>





