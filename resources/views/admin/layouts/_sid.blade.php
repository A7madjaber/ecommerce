<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo">
    <a href="{{route('home')}}" style="font-weight: lighter"><i class="icon ion-android-star-outline"></i> E-commerce</a></div>
<div class="sl-sideleft">



    <div class="sl-sideleft-menu">
        <a href="{{route('admin.home')}}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-home tx-20"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-sitemap tx-20"></i>
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
                <i class="menu-item-icon fa fa-percent tx-20"></i>
                <span class="menu-item-label">Coupons</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.coupon.all') }}" class="nav-link">Coupons</a></li>
            <li class="nav-item"><a href="{{route('admin.coupon.newsletters')}}" class="nav-link">Newsletters</a></li>


        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-th-list tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.product.create')}}" class="nav-link"> New Product</a></li>
            <li class="nav-item"><a href="{{route('admin.product.all')}}" class="nav-link">All Products</a></li>
        </ul>




        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-tag tx-20"></i>
                <span class="menu-item-label">Deals</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.deal.all')}}" class="nav-link">All Deals</a></li>
            <li class="nav-item"><a href="{{route('admin.deal.new')}}" class="nav-link">New Deal</a></li>
        </ul>






        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item" >
                <i class="menu-item-icon fa fa-clipboard tx-20"></i>
                <span class="menu-item-label">Orders</span>
                <span  class="badge badge-warning mr-2" title="Return Requests">{{count(\App\Order::where('return_order',1)->get())}}</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.order.all')}}" class="nav-link">All Orders</a></li>

            <li class="nav-item"><a href="{{route('admin.order.return')}}" class="nav-link">Return Orders</a></li>
        </ul>









        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-rss tx-20"></i>
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
                <i class="menu-item-icon fa fa-file tx-20"></i>
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


        <a href="{{route('admin.message.all')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-envelope tx-20 "></i>

                <span class="menu-item-label">Messages</span>
                <span  class="badge badge-warning mr-2" title="Return Requests">{{count(\App\Contact::where('read_id',0)->get())}}</span>

            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->








        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-cog tx-20"></i>
                <span class="menu-item-label">Settings</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.seo.seo')}}" class="nav-link">SEO Setting</a></li>
            <li class="nav-item"><a href="{{route('admin.settings.settings')}}" class="nav-link">Site Setting</a></li>
        </ul>

    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
