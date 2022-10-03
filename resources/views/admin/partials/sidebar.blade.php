<li class="side-nav-title side-nav-item">Navigation</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
        <i class="uil-home-alt"></i>
        <span class="badge bg-success float-end">4</span>
        <span> Dashboards </span>
    </a>
    <div class="collapse" id="sidebarDashboards">
        <ul class="side-nav-second-level">
            <li>
                <a href="dashboard-analytics.html">Analytics</a>
            </li>
            <li>
                <a href="dashboard-crm.html">CRM</a>
            </li>
            <li>
                <a href="index.html">Ecommerce</a>
            </li>
            <li>
                <a href="dashboard-projects.html">Projects</a>
            </li>
        </ul>
    </div>
</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
        <i class="uil-folder-plus"></i>
        <span> Multi Level </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebarMultiLevel">
        <ul class="side-nav-second-level">
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                    <span> Second Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSecondLevel">
                    <ul class="side-nav-third-level">
                        <li>
                            <a href="javascript: void(0);">Item 1</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">Item 2</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                    <span> Third Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarThirdLevel">
                    <ul class="side-nav-third-level">
                        <li>
                            <a href="javascript: void(0);">Item 1</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">
                                <span> Item 2 </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarFourthLevel">
                                <ul class="side-nav-forth-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Item 2.2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-title side-nav-item">Post</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarPost" aria-expanded="false" aria-controls="sidebarPost" class="side-nav-link">
        <i class="dripicons-document"></i>
        <span> Post </span>
    </a>
    <div class="collapse" id="sidebarPost">
        <ul class="side-nav-second-level">
            <li>
                <a href="#">Post List</a>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarCategory" aria-expanded="false" aria-controls="sidebarCategory" class="side-nav-link">
        <i class="dripicons-box "></i>
        <span> Category </span>
    </a>
    <div class="collapse" id="sidebarCategory">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{ route('category.index') }}">Category List</a>
            </li>
            <li>
                <a href="#">Sub Category List</a>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarTags" aria-expanded="false" aria-controls="sidebarTags" class="side-nav-link">
        <i class="dripicons-tag "></i>
        <span> Tags </span>
    </a>
    <div class="collapse" id="sidebarTags">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{ route('tag.index') }}">Tags List</a>
            </li>
        </ul>
    </div>
</li>



<li class="side-nav-title side-nav-item">Admin</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
        <i class="uil-users-alt "></i>
        <span>Authentication</span>
    </a>
    <div class="collapse" id="sidebarUsers">
        <ul class="side-nav-second-level">
            <li>
                <a href="{{ route('users.index') }}">Users</a>
            </li>
            <li>
                <a href="{{ route('role.index') }}">Roles </a>
            </li>
            <li>
                <a href="{{ route('permission.index') }}"> Permission </a>
            </li>
        </ul>
    </div>
</li>
