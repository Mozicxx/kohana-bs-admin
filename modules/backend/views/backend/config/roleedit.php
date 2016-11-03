<div class="box-body">
    <form id="roleedit">
        <div class="box box-info" style="font-size: 80%;">
            <div class="box-header" >
                <h6 class="box-title" style="font-size: 100%;">角色信息</h6>
            </div>
            <div class="box-body">
                <input type="hidden" name="role_id" id="roleid"/>
                <div class="row">
                    <div class="col-md-8 col-md-offset-1 form-group-sm">
                        <label for="oldpwd">角色名称 :</label>
                        <input type="text" class="input-sm form-control" id="rolename" name="role_name" placeholder="" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 form-group-sm">
                        <label for="newpwd">角色描述 :</label>
                        <textarea class="form-control" id="roledesc" name="role_desc" rows="3" placeholder=""></textarea>
                    </div>
                </div>
                <input type="reset" style="display:none;" />
            </div>
        </div>
        <div class="box box-info" style="font-size: 80%;">
            <div class="box-header">
                <h6 class="box-title" style="font-size: 100%;">角色权限</h6>
            </div>
            <div class="box-body">
                <table class="table table-bordered">

                </table>
            </div>
        </div>
    </form>
</div>