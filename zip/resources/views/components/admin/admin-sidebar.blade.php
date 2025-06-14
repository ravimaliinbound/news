<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Sidebar Menu Start -->
            <ul class="list-unstyled" id="side-menu">
                <!-- Dashboard Link -->
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-chart-areaspline"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.packaging.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span key="t-categories-management">Packaging Slip</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.packaging.list') ? 'active' : '' }}">
                            <a href="{{ route('admin.packaging.list') }}">List</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.packaging.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.packaging.create') }}">Add New</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.packaging.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.quality.list') }}">Quality List</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('admin.warehouse.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span key="t-categories-management">Ware House</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.defective.list') ? 'active' : '' }}">
                            <a href="{{ route('admin.warehouse.list') }}">List</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.defective.add') ? 'active' : '' }}">
                            <a href="{{ route('admin.warehouse.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('admin.gatepass.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span key="t-categories-management">Gate Pass Slip</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.gatepass.list') ? 'active' : '' }}">
                            <a href="{{ route('admin.gatepass.list') }}">List</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.gatepass.add') ? 'active' : '' }}">
                            <a href="{{ route('admin.gatepass.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('admin.inward.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span key="t-categories-management">Partial Inward</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.inward.list') ? 'active' : '' }}">
                            <a href="{{ route('admin.inward.list') }}">List</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.inward.add') ? 'active' : '' }}">
                            <a href="{{ route('admin.inward.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('admin.sample.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span key="t-categories-management">Sample</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.sample.list') ? 'active' : '' }}">
                            <a href="{{ route('admin.sample.list') }}">List</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.sample.add') ? 'active' : '' }}">
                            <a href="{{ route('admin.sample.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('admin.defective.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span key="t-categories-management">Defective Pics</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.defective.list') ? 'active' : '' }}">
                            <a href="{{ route('admin.defective.list') }}">List</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.defective.add') ? 'active' : '' }}">
                            <a href="{{ route('admin.defective.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('admin.profile') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-settings-outline"></i>
                        <span key="t-manage-profile">Manage Profile</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile') }}">Edit Profile</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <!-- Sidebar Menu End -->
        </div>
    </div>
</div>
