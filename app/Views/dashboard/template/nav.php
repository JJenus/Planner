<nav id="sidebarMenu" class="sidebar d-md-block bg-warning text-white collapse px-4">
    <div class="sidebar-sticky pt-4 mx-auto">
        <div class="user-card d-flex align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="user-avatar lg-avatar mr-4">
                  <img src="<?=base_url()?>/assets/img/favicon/logo-white.png" class="card-img-top rounded-circle border-white" alt="Bonnie Green" />
                </div>
                <div class="d-block">
                    <h2 class="h6">Hi, <?= $user->fullname ?></h2>
                    <a href="<?=base_url()?>/logout" class="btn btn-secondary btn-xs">
                        <span class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out
                    </a>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
            </div>
        </div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item <?php if ($page==='overview'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/overview" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                    <span>Overview</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='messages'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/messages" class="nav-link d-flex align-items-center justify-content-between">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-inbox"></span></span> Messages
                    </span>
                    <span class="badge badge-md badge-danger badge-pill">4</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='plans'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/plans" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-university "></span></span> 
                    <span>Plans</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='upload-plan'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/upload-plan" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-cloud-upload-alt"></span></span> 
                    <span>Upload Plan</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='users'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/users" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-user-check"></span></span> 
                    <span>Users List</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='transactions'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/transactions" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-hand-holding-usd"></span></span> 
                    <span>Transactions</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='orders'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/orders" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-clipboard-list"></span></span> 
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item <?php if ($page==='settings'): ?>active<?php endif; ?>">
                <a href="<?=base_url()?>/dashboard/settings" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-cog"></span></span> <span>Settings</span>
                </a>
            </li>
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-blue"></li>
           
        </ul>
    </div>
</nav>
                    