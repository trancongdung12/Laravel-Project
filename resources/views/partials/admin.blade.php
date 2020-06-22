  <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="https://user-images.githubusercontent.com/35910158/35493994-36e2c50e-04d9-11e8-8b38-890caea01850.png" height="50px" width="50px" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="/admin/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li >
                            <a class="js-arrow" href="/users/show" >
                                <i class="fas fa-user"></i>Users</a>
                            <ul id="user" class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/users/show">Show User</a>
                                </li>
                            </ul>
                        </li>

                        <li >
                            <a class="js-arrow" href="#" onclick="shownd()">
                                <i class="fas fa-align-left"></i>Product</a>
                            <ul id="product" style="display: none" class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/product/show">Show Product</a>
                                </li>
                                <li>
                                    <a href="/product/create">Add Product</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="/admin/dashboard">
                                <i class="fas fa-outdent"></i>Order</a>
                        </li>
                        <li>
                            <a href="/home/logout">
                                <i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            <div class="header-button">

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->


        </div>

    </div>
<script>
        function shownd(){
        var txt = document.getElementById('product');
        txt.style.display = 'block';
}
</script>

