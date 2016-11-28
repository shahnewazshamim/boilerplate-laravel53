<div id="sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
<div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
    <div class="shortcuts">
        <ul>
            <li>
                <a href="" title="Support section" class="tip"><i class="s24 icomoon-icon-support"></i></a>
            </li>
            <li>
                <a href="" title="Database backup" class="tip"><i class="s24 icomoon-icon-database"></i></a>
            </li>
            <li>
                <a href="" title="Sales statistics" class="tip"><i class="s24 icomoon-icon-pie-2"></i></a>
            </li>
            <li>
                <a href="" title="Write post" class="tip"><i class="s24 icomoon-icon-pencil"></i></a>
            </li>
        </ul>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-scrollarea">
            <div class="sidenav">
                <div class="sidebar-widget mb0">
                    <h6 class="title mb0">Modules / Components</h6>
                </div>
                <div class="mainnav">
                    <ul>
                        <li>
                            <a href="{{ url('home') }}"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="s16 icomoon-icon-stats-up"></i><span class="txt">Access Control</span></a>
                            <ul class="sub">
                                <li>
                                    <a href="{{ url('access/role') }}"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Manage Role</span></a>
                                    <a href="{{ url('access/permission') }}"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Manage Permission</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End sidenav -->
            <div class="sidebar-widget">
                <h6 class="title">Application Status</h6>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">Laravel</span>
                    <span class="percent pull-right">{{ app()->version() }}</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">jQuery</span>
                    <span class="percent pull-right">2.2.1</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">jQuery UI</span>
                    <span class="percent pull-right">1.10.4</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">jQuery Migrate</span>
                    <span class="percent pull-right">1.2.1</span>
                </div>
            </div>
            <!-- End .sidenav-widget -->
            <div class="sidebar-widget">
                <h6 class="title">Disk Space Usage</h6>
                <div class="content clearfix">
                    <i class="s16  icomoon-icon-storage-2 pull-left mr10 text-info"></i>
                    <div class="progress progress-bar-xs pull-left mt5 tip" title="100%">
                        <div class="progress-bar progress-bar-info" style="width: 100%;"></div>
                    </div>
                    <span class="percent pull-right">All</span>
                    <div class="stat">Total: {{ get_disk_size_unit(disk_total_space("/")) }}</div>
                </div>
                <div class="content clearfix">
                    <i class="s16  icomoon-icon-storage-2 pull-left mr10 text-warning"></i>
                    <?php $used = floor(((disk_total_space("/") - disk_free_space ("/"))*100)/disk_total_space("/")); ?>
                    <div class="progress progress-bar-xs pull-left mt5 tip" title="{{ $used }}%">
                        <div class="progress-bar progress-bar-warning" style="width: {{ $used }}%;"></div>
                    </div>
                    <span class="percent pull-right">{{ $used }}%</span>
                    <div class="stat">Used: {{ get_disk_size_unit(disk_total_space("/") - disk_free_space ("/")) }}</div>
                </div>
                <div class="content clearfix">
                    <i class="s16  icomoon-icon-storage-2 pull-left mr10 text-success"></i>
                    <?php $free = ceil(((disk_free_space ("/"))*100)/disk_total_space("/")); ?>
                    <div class="progress progress-bar-xs pull-left mt5 tip" title="{{ $free }}%">
                        <div class="progress-bar progress-bar-success" style="width: {{ $free }}%;"></div>
                    </div>
                    <span class="percent pull-right">{{ $free }}%</span>
                    <div class="stat">Free: {{ get_disk_size_unit(disk_free_space ("/")) }}</div>
                </div>
            </div>
            <!-- End .sidenav-widget -->
            <div class="sidebar-widget">
                <h6 class="title">System Status</h6>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">Server Software</span>
                    <span class="percent pull-right">{{ get_server_info()[0] }}</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">PHP Version</span>
                    <span class="percent pull-right">{{ get_server_info()[3] }}</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">Database</span>
                    <span class="percent pull-right">{{ get_database_server()->version }}</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">SSL</span>
                    <span class="percent pull-right">{{ get_server_info()[2] }}</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">OS Dist</span>
                    <span class="percent pull-right">{{ get_os_info() }}</span>
                </div>
                <div class="content clearfix  status-item text-muted">
                    <span class="pull-left">Browser</span>
                    <span class="percent pull-right">{{ get_browser_info() }}</span>
                </div>
            </div>
            <!-- End .sidenav-widget -->
            <div class="sidebar-widget">
                <h6 class="title"></h6>
            </div>
            <!-- End .sidenav-widget -->
        </div>
        <!-- End .sidebar-scrollarea -->
    </div>
    <!-- End .sidebar-inner -->
</div>
<!-- End #sidebar -->