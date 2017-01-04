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
    <label for="school" class="col-md-3 control-label">
        学校
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="school" id="school" value="{{ $school }}">
    </div>
</div>

<div class="form-group">
    <label for="grade" class="col-md-3 control-label">
        年级
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="grade" id="grade" value="{{ $grade }}">
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





