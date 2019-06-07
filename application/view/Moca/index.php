<script>
    function checkData(){
        var y=myForm.tel.value;
        if(y==null||y==""){
            myForm.tel.focus();
            return false;
        }else{
            return true;
        }
    }
</script>
<div class="quan">
    <div class="jubu">
        <img id="index_img"src="<?php echo SUPPORT_P.'img/avatar.png';?>"></img>
        <div id="index_div">
            <form class="form-horizontal" role="form" name="myForm" onSubmit="return checkData()">
                <div class="form-group">
                    <label for="disabledTextInput"  class="col-sm-4 control-label">用户名：</label>
                    <div class="col-sm-8">
                        <input type="text" id="TextInput" class="form-control"  placeholder="2017904111">
                    </div>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput"  class="col-sm-4 control-label">性别：</label>
                    <div class="col-sm-8">
                        <input type="text" id="disabledTextInput" class="form-control"  placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput"  class="col-sm-4 control-label">学院：</label>
                    <div class="col-sm-8">
                        <input type="text" id="disabledTextInput" class="form-control"  placeholder="学院">
                    </div>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput"  class="col-sm-4 control-label">楼号：</label>
                    <div class="col-sm-8">
                        <input type="text" id="disabledTextInput" class="form-control"  placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput"  class="col-sm-4 control-label">宿舍：</label>
                    <div class="col-sm-8">
                        <input type="text" id="disabledTextInput" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group" style="height: 35px;">
                    <label class="col-sm-4 control-label">电话：</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="tel" id="focusedInput" type="tel" placeholder="">
                    </div>
                </div>
            <div id="index_footdiv">
                <button type="submit"  class="btn btn-info">提交</button>
                <button type="reset"  class="btn btn-info">重置</button>
            </div>
            </form>
        </div>
    </div>
