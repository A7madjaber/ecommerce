<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>



                        <ul class="cat_menu">
                            @foreach(categories() as $category)


                                <li class="hassubs">

                                    <a href="{{route('product.category',$category->id)}}">{{$category->category_name}}

                                        @if($category->subCategories()->exists())
                                            <i class="fas fa-chevron-right"></i></a>
                                    <ul>

                                        @foreach($category->subCategories as $row)
                                            <li class="hassubs">
                                                <a href="{{route('product.subcategory',$row->id)}}">{{$row->subcategory_name}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{route('home')}}">Home<i class="fas fa-chevron-down"></i></a></li>
                            <li class="hassubs">
                                <a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="hassubs">
                                <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                <ul>

                                    @foreach( brands() as $brand)

                                        <li><a href="{{route('product.brand',$brand->id)}}">{{$brand->brand_name}}<i class="fas fa-chevron-down"></i></a></li>
                                    @endforeach

                                </ul>
                            </li>


                            <li><a href="{{route('blog.posts')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="{{route('contact')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
