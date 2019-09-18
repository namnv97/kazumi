<!DOCTYPE html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title','Admin Dashboard')</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf_token" content="{{csrf_token()}}">

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin_lte.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/ionicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin_style.css')}}">
    @yield('css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="{{route('home')}}" class="logo" target="_blank">
          <span class="logo-mini"><b>KAZUMI</b></span>
          <span class="logo-lg"><b>KAZUMI</b></span>
      </a>
      <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @php
            $avatar = '/assets/uploads/images/user.png'
        @endphp
        @if(!empty(Auth::user()->avatar))
            @php
                $avatar = Auth::user()->avatar
            @endphp
        @endif
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset($avatar)}}" class="user-image" alt="{{Auth::user()->name}}">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset($avatar)}}" class="img-circle" alt="{{Auth::user()->name}}">

                            <p>Admin</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('client.account.profile')}}" class="btn btn-default btn-flat" target="_blank">Cá nhân</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset($avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{(request()->is('admin'))?'active':FALSE}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{(request()->is('admin/collection*'))?'active':FALSE}}">
                <a href="{{route('admin.collection.index')}}">
                    <i class="fa fa-book"></i>
                    <span>Danh mục</span>
                </a>
            </li>
            <li class="{{(request()->is('admin/color*'))?'active':FALSE}}">
                <a href="{{route('admin.color.index')}}">
                    <i class="fa fa-paint-brush"></i>
                    <span>Màu sắc</span>
                </a>
            </li>
            <li class="treeview {{(request()->is('admin/products*'))?'active':FALSE}}">
                <a href="{{route('admin.products.index')}}">
                    <i class="fa fa-gift"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/products'))?'active':FALSE}}"><a href="{{route('admin.products.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/products/create'))?'active':FALSE}}"><a href="{{route('admin.products.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/discount*') || request()->is('admin/voucher*'))?'active':FALSE}}">
                <a href="{{route('admin.tier.index')}}">
                    <i class="fa fa-leaf"></i>
                    <span>Giảm giá</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/discount'))?'active':FALSE}}">
                        <a href="{{route('admin.discount.index')}}"><i class="fa fa-circle-o"></i> Mã giảm giá</a>
                    </li>
                    <li class="{{(request()->is('admin/voucher'))?'active':FALSE}}">
                        <a href="{{route('admin.voucher.index')}}"><i class="fa fa-circle-o"></i> Voucher giảm giá</a>
                    </li>
                   
                </ul>
            </li>
            <li class="{{(request()->is('admin/orders*'))?'active':FALSE}}">
                <a href="{{route('admin.orders.index')}}">
                    <i class="fa fa-list-alt"></i>
                    <span>Đơn hàng</span>
                    @if($order_pending > 0)
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">{{$order_pending}}</span>
                  </span>
                  @endif
                </a>
            </li>
            <li class="treeview {{(request()->is('admin/articles*'))?'active':FALSE}}">
                <a href="{{route('admin.articles.index')}}">
                    <i class="fa fa-paste"></i>
                    <span>Tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/articles'))?'active':FALSE}}"><a href="{{route('admin.articles.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/articles/create'))?'active':FALSE}}"><a href="{{route('admin.articles.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/pages*'))?'active':FALSE}}">
                <a href="{{route('admin.pages.index')}}">
                    <i class="fa fa-copy"></i>
                    <span>Trang</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/pages'))?'active':FALSE}}"><a href="{{route('admin.pages.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/pages/create'))?'active':FALSE}}"><a href="{{route('admin.pages.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="{{(request()->is('admin/forms*'))?'active':FALSE}}">
                <a href="{{route('admin.forms.index')}}">
                    <i class="fa fa-list-alt"></i>
                    <span>Form Data</span>
                </a>
            </li>
            <li class="{{(request()->is('admin/user*'))?'active':FALSE}}">
                <a href="{{route('admin.user.index')}}">
                    <i class="fa fa-user"></i>
                    <span>Người dùng</span>
                </a>
            </li>
            <li class="treeview {{(request()->is('admin/tier*'))?'active':FALSE}}">
                <a href="{{route('admin.tier.index')}}">
                    <i class="fa fa-cog"></i>
                    <span>Bậc thưởng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/tier'))?'active':FALSE}}">
                        <a href="{{route('admin.tier.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a>
                    </li>
                    <li class="{{(request()->is('admin/tier/create'))?'active':FALSE}}">
                        <a href="{{route('admin.tier.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a>
                    </li>
                   
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/earn_point*'))?'active':FALSE}}">
                <a href="{{route('admin.earn_point.index')}}">
                    <i class="fa fa-cog"></i>
                    <span>Kiếm điểm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/earn_point'))?'active':FALSE}}">
                        <a href="{{route('admin.earn_point.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a>
                    </li>
                    <li class="{{(request()->is('admin/earn_point/create'))?'active':FALSE}}">
                        <a href="{{route('admin.earn_point.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a>
                    </li>
                   
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/get_reward*'))?'active':FALSE}}">
                <a href="{{route('admin.get_reward.index')}}">
                    <i class="fa fa-cog"></i>
                    <span>Phần thưởng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/get_reward'))?'active':FALSE}}">
                        <a href="{{route('admin.get_reward.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a>
                    </li>
                    <li class="{{(request()->is('admin/get_reward/create'))?'active':FALSE}}">
                        <a href="{{route('admin.get_reward.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a>
                    </li>
                   
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/options*'))?'active':FALSE}}">
                <a href="{{route('admin.options.index')}}">
                    <i class="fa fa-cog"></i>
                    <span>Thiết lập</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/options'))?'active':FALSE}}">
                        <a href="{{route('admin.options.index')}}"><i class="fa fa-circle-o"></i> Thiết lập chung</a>
                    </li>
                    <li class="{{(request()->is('admin/options/menu'))?'active':FALSE}}">
                        <a href="{{route('admin.options.menu')}}"><i class="fa fa-circle-o"></i> Thiết lập Menu</a>
                    </li>
                    <li class="{{(request()->is('admin/options/megamenu'))?'active':FALSE}}">
                        <a href="{{route('admin.options.megamenu')}}"><i class="fa fa-circle-o"></i> Thiết lập Mega Menu</a>
                    </li>
                    <li class="{{(request()->is('admin/options/footer'))?'active':FALSE}}">
                        <a href="{{route('admin.options.footer')}}"><i class="fa fa-circle-o"></i> Thiết lập Footer</a>
                    </li>
                    <li class="{{(request()->is('admin/options/home'))?'active':FALSE}}">
                        <a href="{{route('admin.options.home')}}"><i class="fa fa-circle-o"></i> Thiết lập trang chủ</a>
                    </li>
                </ul>
            </li>


        </ul>
    </section>
    
</aside>

<div class="content-wrapper">
    @yield('content')
</div>
<script src="{{asset('assets/admin/js/jquery-1.9.1.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/admin/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sweet.alert.min.js')}}"></script>
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/ckfinder/ckfinder.js')}}"></script>
<script src="{{asset('assets/admin/js/config_ck.js')}}"></script>
<script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
<script src="{{asset('assets/admin/js/clamp.min.js')}}"></script>
<script src="{{asset('assets/admin/js/moment.js')}}"></script>
<script src="{{asset('assets/admin/js/custom.js')}}"></script>

<script type="text/javascript">
    function ChangeToSlug(str)
    {
        var slug;
        //Đổi chữ hoa thành chữ thường
        slug = str.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/\&/gi, 'va');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');

        return slug;
    }
</script>

@yield('script')

</body>
</html>
