<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown @if (Route::currentRouteName() == 'admin') open @endif">
                <a class="dropdown-toggle" href="{{ route('admin') }}" style="text-decoration: none;">
                    <span class="icon-holder">
                       <i class="nav-icon fas fa-chart-line text-info"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown @if (Route::currentRouteName() == 'products.index') open @endif">
                <a class="dropdown-toggle" href="{{ route('products.index') }}" style="text-decoration: none;">
                    <span class="icon-holder">
                        <i class="nav-icon fab fa-product-hunt text-info"></i>
                    </span>
                    <span class="title">Products</span>
                </a>
            </li>

            <li class="nav-item dropdown @if (Route::currentRouteName() == 'product_categories.index') open @endif">
                <a class="dropdown-toggle" href="{{ route('product_categories.index') }}" style="text-decoration: none;">
                    <span class="icon-holder">
                    <i class="nav-icon fas fa-bars text-info"></i>
                    </span>
                    <span class="title">Product Category</span>
                </a>
            </li>

            <li class="nav-item dropdown @if (Route::currentRouteName() == 'car_items.index') open @endif">
                <a class="dropdown-toggle" href="{{ route('car_items.index') }}" style="text-decoration: none;">
                    <span class="icon-holder">
                    <i class="nav-icon fas fa-car text-info"></i>
                    </span>
                    <span class="title">Car Items</span>
                </a>
            </li>
        </ul>
    </div>
</div>
