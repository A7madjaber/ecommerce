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
            @if(auth()->user()->hasPermission('read_categories'))
            <li class="nav-item"><a href="{{route('admin.category.all')}}" class="nav-link">Category</a></li>
            @endif
                @if(auth()->user()->hasPermission('read_subcategory'))
            <li class="nav-item"><a href="{{route('admin.subCategory.all')}}" class="nav-link">Sub Category</a></li>
                @endif
                @if(auth()->user()->hasPermission('read_brands'))
            <li class="nav-item"><a href="{{route('admin.brand.all')}}" class="nav-link">Brand</a></li>
                @endif

        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-percent tx-20"></i>
                <span class="menu-item-label">Coupons</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @if(auth()->user()->hasPermission('read_coupon'))
                <li class="nav-item"><a href="{{route('admin.coupon.all') }}" class="nav-link">Coupons</a></li>
            @endif

                @if(auth()->user()->hasPermission('read_newsLetter'))
                    <li class="nav-item"><a href="{{route('admin.coupon.newsletters')}}" class="nav-link">Newsletters</a></li>
                @endif

        </ul>


        @if(auth()->user()->hasPermission('read_product'))
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-th-list tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @if(auth()->user()->hasPermission('create_product'))
            <li class="nav-item"><a href="{{route('admin.product.create')}}" class="nav-link"> New Product</a></li>
            @endif
            <li class="nav-item"><a href="{{route('admin.product.all')}}" class="nav-link">All Products</a></li>
        </ul>
        @endif


        @if(auth()->user()->hasPermission('read_deal'))


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-tag tx-20"></i>
                <span class="menu-item-label">Deals</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.deal.all')}}" class="nav-link">All Deals</a></li>
            @if(auth()->user()->hasPermission('create_deal'))
                <li class="nav-item"><a href="{{route('admin.deal.new')}}" class="nav-link">New Deal</a></li>
                @endif
        </ul>

@endif


        @if(auth()->user()->hasPermission('read_order'))

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

        @endif


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-rss tx-20"></i>
                <span class="menu-item-label">Blog</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @if(auth()->user()->hasPermission('read_blogCategory'))

            <li class="nav-item"><a href="{{route('admin.blog.category.all')}}" class="nav-link">Blog Categories</a></li>
            @endif
                @if(auth()->user()->hasPermission('create_blogPost'))

                <li class="nav-item"><a href="{{route('admin.blog.post.create')}}" class="nav-link">Add Post</a></li>
                @endif
                @if(auth()->user()->hasPermission('read_blogPost'))

                <li class="nav-item"><a href="{{route('admin.blog.post.all')}}" class="nav-link">Posts list</a></li>
                    @endif
        </ul>

        @if(auth()->user()->hasPermission('read_contact'))


        <a href="{{route('admin.message.all')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-envelope tx-20 "></i>

                <span class="menu-item-label">Contact </span>
                <span  class="badge badge-warning mr-2" title="Return Requests">{{count(\App\Contact::where('read_id',0)->get())}}</span>

            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        @endif

        @if(auth()->user()->hasPermission('read_roles'))


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-lock tx-20"></i>
                <span class="menu-item-label">Roles</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @if(auth()->user()->hasPermission('create_roles'))

            <li class="nav-item"><a href="{{route('admin.role.create')}}" class="nav-link">New Role</a></li>
            @endif
            <li class="nav-item"><a href="{{route('admin.role.all')}}" class="nav-link">All Roles</a></li>
        </ul>

@endif


        @if(auth()->user()->hasPermission('read_admins'))

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-user tx-20"></i>
                <span class="menu-item-label">Admins</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @if(auth()->user()->hasPermission('create_admins'))

            <li class="nav-item"><a href="{{route('admin.admin.create')}}" class="nav-link">New Admin</a></li>
            @endif
            <li class="nav-item"><a href="{{route('admin.admin.all')}}" class="nav-link">All Admin</a></li>
        </ul>


        @endif




        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-cog tx-20"></i>
                <span class="menu-item-label">Settings</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @if(auth()->user()->hasPermission('read_seo'))

            <li class="nav-item"><a href="{{route('admin.seo.seo')}}" class="nav-link">SEO Setting</a></li>
                @endif
                @if(auth()->user()->hasPermission('read_settings'))

                <li class="nav-item"><a href="{{route('admin.settings.settings')}}" class="nav-link">Site Setting</a></li>
                    @endif
        </ul>


    </div><!-- sl-sideleft-menu -->





    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
