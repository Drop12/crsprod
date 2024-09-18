<ul class="menu-inner py-1" style="background-color:#06358a;">
    <!-- Dashboards -->


    <li class="menu-item text-center">
        <a href="adminhome">
            <img src="assets/img/logo2.jpeg" style="width:200px;margin-bottom:10px;border-radius: 4px;">
        </a>
    </li>
    <?php if($_SESSION['userrole']=="crsadmin")
    {
        ?>
    <li class="menu-item" style="color:white;">
        <a href="adminhome" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home" style="color:white;"></i>
            <div data-i18n="Dashboards" style="color:white;">Dashboards</div>
        </a>
    </li>
    <?php

    }
    else
    {
    ?>
<li class="menu-item">
        <a href="useradminhome" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home" style="color:white;"></i>
            <div data-i18n="Dashboards" style="color:white;">Dashboards</div>
        </a>
    </li>


    <?php } ?>
    

    <!--<li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            <div class="badge bg-danger rounded-pill ms-auto">5</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="index.html" class="menu-link">
                    <div data-i18n="Analytics">Analytics</div>
                </a>
            </li>
        </ul>
    </li>-->

    <!-- Layouts -->
    \

    <!-- Front Pages -->



    <!-- Apps & Pages -->
    <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Menu" style="color:white;">Menu</span>
    </li>
    

    <?php if($_SESSION['userrole']=="crsadmin")
    {
        ?>
    <li class="menu-item">
        <a href="callregi" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Call Registry" style="color:white;">Call Registry</div>
        </a>
    </li>
    
    <li class="menu-item">
        <a href="shortocee" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Shortcode Entries" style="color:white;">Shortcode Entries</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="reassigned" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Reassigned" style="color:white;">Reassigned</div>
        </a>
    </li>
    <?php

    }
    ?>
    <li class="menu-item">
        <a href="transcribes" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Transcribe Call" style="color:white;">Transcribe Call</div>
        </a>
    </li>
    <!--<li class="menu-item">
        <a href="app-kanban.html" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
            <div data-i18n="Kanban">Kanban</div>
        </a>
    </li>-->
    <!-- e-commerce-app menu start -->
    <!--<li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-layout-grid'></i>
            <div data-i18n="Reports">Reports</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="rreport" class="menu-link">
                    <div data-i18n="Regional Reports">Regional Reports</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Programs Report">Programs Reports</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="rcall" class="menu-link">
                            <div data-i18n="Call Center">Call Center</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="rshort" class="menu-link">
                            <div data-i18n="Shortcode">Shortcode</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>-->
    <!-- e-commerce-app menu end -->
    <!-- Academy menu start -->

    <!-- Components -->
    <!--<li class="menu-header small">
        <span class="menu-header-text" data-i18n="Analitics">Analitics</span>
    </li>
    <!-- Cards -->
    <!--<li class="menu-item">
        <a href="abyloc" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid"></i>
            <div data-i18n="By Locations">By Locations</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="abylproj" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid"></i>
            <div data-i18n="By Projects">By Projects</div>
        </a>
    </li>-->


    <!-- Forms & Tables -->
    <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Settings" style="color:white;">Settings</span>
    </li>
    
    <?php if($_SESSION['userrole']=="crsadmin")
    {
        ?>
    <li class="menu-item">
        <a href="projects" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Projects" style="color:white;">Projects</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="locations" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Locations" style="color:white;">Locations</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="userprofiles" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Users Profiles" style="color:white;">Users Profiles</div>
        </a>
    </li>
    <?php

    }
    ?>
    <li class="menu-item">
        <a href="changepassword" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout-grid" style="color:white;"></i>
            <div data-i18n="Change Passwords" style="color:white;">Change Password</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="logout" class="menu-link">
            <i class="menu-icon tf-icons ti ti-logout" style="color:white;"></i>
            <div data-i18n="Log Out" style="color:white;">Log Out</div>
        </a>
    </li>
</ul>