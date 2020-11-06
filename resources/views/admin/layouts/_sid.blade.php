<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo">
    <a href="{{route('home')}}" style="font-weight: lighter"><i class="icon ion-android-star-outline"></i> E-commerce</a></div>
<div class="sl-sideleft">



    <div class="sl-sideleft-menu">
        <a href="{{route('admin.home')}}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-grid tx-20"></i>
                <span class="menu-item-label">Category</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.category.all')}}" class="nav-link">Category</a></li>
            <li class="nav-item"><a href="{{route('admin.subCategory.all')}}" class="nav-link">Sub Category</a></li>
            <li class="nav-item"><a href="{{route('admin.brand.all')}}" class="nav-link">Brand</a></li>

        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon icon ion-star tx-24"></i>
                <span class="menu-item-label">Coupons</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.coupon.all') }}" class="nav-link">Coupons</a></li>

        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-navicon-round tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.product.create')}}" class="nav-link"> New Product</a></li>
            <li class="nav-item"><a href="{{route('admin.product.all')}}" class="nav-link">All Products</a></li>
        </ul>


        <a href="{{route('admin.order.all')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-clipboard tx-20"></i>
                <span class="menu-item-label">Orders</span>

            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->



        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Others</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.coupon.newsletters')}}" class="nav-link">Newsletters</a></li>
            <li class="nav-item"><a href="{{route('admin.seo.seo')}}" class="nav-link">SEO Setting</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Blog</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.blog.category.all')}}" class="nav-link">Blog Categories</a></li>
            <li class="nav-item"><a href="{{route('admin.blog.post.create')}}" class="nav-link">Add Post</a></li>
            <li class="nav-item"><a href="{{route('admin.blog.post.all')}}" class="nav-link">Posts list</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-filing tx-20"></i>
                <span class="menu-item-label">Reports</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.report.all',[date('d-m-y'),'0'])}}" class="nav-link">Today Orders</a></li>
            <li class="nav-item"><a href="{{route('admin.report.all',[date('d-m-y'),'3'])}}" class="nav-link">Today Delivery</a></li>
            <li class="nav-item"><a href="{{route('admin.report.all',[date('F'),'0'])}}" class="nav-link">This Month Orders</a></li>
            <li class="nav-item"><a href="{{route('admin.report.all',[date('F'),'3'])}}" class="nav-link">This Month Delivery</a></li>
            <li class="nav-item"><a href="{{route('admin.report.search')}}" class="nav-link">Search Report</a></li>
        </ul>
        <a href="mailbox.html" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Mailbox</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Pages</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
            <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
            <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
            <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
        </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
