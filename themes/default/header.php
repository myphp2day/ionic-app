<header class="header white-bg">
        <!--logo start-->
        <a href="<?php _e(SITE_URL);?>account/dashboard" class="logo">DEMO</a>
        <!--logo end-->
        <div class="horizontal-menu navbar-collapse collapse">
            <ul class="nav navbar-nav">
            	<li>
                    <a href="<?php _e(SITE_URL);?>account/dashboard"<?php if(strstr(_env('request_uri'), 'dashboard')) {?> class="active"<?php } ?>><i class="fa fa-desktop"></i> Dashboard</a>
                </li>

                <li><a href="<?php _e(SITE_URL);?>account/customers"<?php if(strstr(_env('request_uri'), 'customer')) {?> class="active"<?php } ?>><i class="fa fa-desktop"></i> Customers</a></li>

                <?php if($account_obj->checkModule('page')) { ?>
                <li class="dropdown<?php if(strstr(_env('request_uri'), _b64('navigation')) || strstr(_env('request_uri'), 'page')) {?> active<?php } ?>"><a href="<?php _e(SITE_URL);?>page/list" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle <?php if(strstr(_env('request_uri'), 'page')) {?> active<?php } ?>"><i class="fa fa-file-text-o"></i> Pages</a>
                    <ul class="dropdown-menu">
                        <li<?php if(strstr(_env('request_uri'), 'page/')) {?> class="active"<?php } ?>><a href="<?php _e(SITE_URL);?>page/list">All Pages</a></li>
                        <li<?php if(strstr(_env('request_uri'), _b64('navigation'))) {?> class="active"<?php } ?>><a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('navigation'));?>">Navigations</a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if($account_obj->checkModule('product')) { ?>
                    <li class="dropdown<?php if(strstr(_env('request_uri'), 'product')) {?> active<?php } ?>"><a href="<?php _e(SITE_URL);?>product/list" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle <?php if(strstr(_env('request_uri'), 'product')) {?> active<?php } ?>"><i class="fa fa-file-text-o"></i> Products</a>
                        <ul class="dropdown-menu">
                            <li<?php if(strstr(_env('request_uri'), 'product/list')) {?> class="active"<?php } ?>><a href="<?php _e(SITE_URL);?>product/list">Manage Products</a></li>
                            <li<?php if(strstr(_env('request_uri'), _b64('navigation'))) {?> class="active"<?php } ?>><a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('navigation'));?>">Navigations</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if($account_obj->checkModule('access-user')) { ?>
                <li class="dropdown<?php if(strstr(_env('request_uri'), 'account/list') || strstr(_env('request_uri'), 'access-type')) {?> active<?php } ?>"><a href="<?php _e(SITE_URL);?>account/list" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle <?php if(strstr(_env('request_uri'), 'account/list') || strstr(_env('request_uri'), 'access-type')) {?> active<?php } ?>"><i class="fa fa-user"></i> Access Users</a>
                    <ul class="dropdown-menu">
                        <li<?php if(strstr(_env('request_uri'), 'account')) {?> class="active"<?php } ?>><a href="<?php _e(SITE_URL);?>account/list">Users List</a></li>
                        <li<?php if(strstr(_env('request_uri'), _b64('access-type'))) {?> class="active"<?php } ?>><a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('access-type'));?>">Access Types</a></li>
                    </ul>
                </li>
                <?php } ?>

                <!--Master-->

                <li class="dropdown <?php if(strstr(_env('request_uri'), _b64('category')) || strstr(_env('request_uri'), 'master')) {?>
                 active<?php } ?>">
                    <a href="<?php _e(SITE_URL);?>content/list" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle
                    <?php if(strstr(_env('request_uri'), 'master')) {?> active<?php } ?>">
                        <i class="fa fa-user"></i>Master</a>
                    <ul class="dropdown-menu">
                        <li<?php if(strstr(_env('request_uri'), _b64('category'))) {?> class="active"<?php } ?>>
                            <a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('category'));?>">Manage Categories</a>
                        </li>
                        <li<?php if(strstr(_env('request_uri'), _b64('quantity'))) {?> class="active"<?php } ?>>
                            <a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('quantity'));?>">Manage Quantities</a>
                        </li>
                        <li<?php if(strstr(_env('request_uri'), _b64('slot'))) {?> class="active"<?php } ?>>
                            <a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('slot'));?>">Manage Slots</a>
                        </li>
                        <li<?php if(strstr(_env('request_uri'), _b64('area'))) {?> class="active"<?php } ?>>
                            <a href="<?php _e(SITE_URL);?>master/list?t=<?php _e(_b64('area'));?>">Manage Areas</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php _e(SITE_URL);?>default/sync-db"<?php if(strstr(_env('request_uri'), 'sync-db')) {?> class="active"<?php } ?>><i class="fa fa-upload"></i> Save DB</a>
                </li>

            </ul>
            <div class="clear"></div>
        </div>
        <div class="nav notify-row" id="top_menu"><?php _e(_msg('ERR', 'error'));?></div>
        <div class="top-nav">
          <ul class="nav pull-right top-menu">
              <!-- user login dropdown start-->
              <li class="dropdown">
                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <?php _e($_SESSION[PF.'NAME']);?>
                      <b class="caret"></b>
                  </a>
                <ul class="dropdown-menu extended logout">
                      <div class="log-arrow-up"></div>
                      <?php ?><li><a href="<?php _e(SITE_URL);?>account/profile"><i class=" fa fa-suitcase"></i>Profile</a></li><?php ?>
                      <li><a href="javascript:void(0);"><?php _e($_SESSION[PF.'NAME']);?></a></li>
                      <?php /*?><li><a href="<?php _e(SITE_URL);?>account/settings"><i class="fa fa-cog"></i> Settings</a></li><?php */?>
                      <li><a href="<?php _e(SITE_URL);?>account/logout/do"><i class="fa fa-key"></i> Log Out</a></li>
                  </ul>
              </li>
              <!-- user login dropdown end -->
          </ul>
      </div>
    </header>