
<?php
$arr = array();
$son = [];
foreach ($config as $k => $g) {
    $flag = 0;
    foreach ($g as $i => $m) {
//        $permission = in_array($m["uri"], $this->permission);
        $permission = true;
        if (is_array($m) && $permission && $m["display"]) {
            $son[] = array("id" => $m["id"], "pid" => $g["id"], "text" => $m["name"], "iconCls" => $m["id"], "url" => URL::site($m["uri"], TRUE));
            $flag++;
        }
    }
    if ($flag) {
        $arr[] = ["id" => $g["id"], "text" => $k, "iconCls" => $g["id"], "son" => $son];
    }
    $son = [];
}

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="输入搜索内容...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--                <li class="header">MAIN NAVIGATION</li>-->
<?php foreach ($arr as $item) : ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span><?php echo $item['text'];?></span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <?php foreach ($item['son'] as $value) : ?>
                        <li class="" <?php echo "sid=\"",$value['id'],"\" pname=\"",$item['text'],"\"";?>><a href="<?php echo $value['url'];?>"><i class="fa fa-circle-o"></i> <?php echo $value['text'];?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
<?php endforeach; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
