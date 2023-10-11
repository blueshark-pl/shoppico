<!DOCTYPE html>
<html dir="ltr" lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
        echo $this->Html->meta("_csrfToken", $this->request->getAttribute("csrfToken")); 
    ?>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/backend/assets/images/favicon.png">
    <title>Shoppico - Automatyczna wyszukiwarka okazji, której pomaga AI</title>
    <!-- Custom CSS -->
    <link href="/backend/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/backend/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <script src="/backend/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link href="/backend/dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
.page-wrapper > .container-fluid, .page-wrapper > .container-sm, .page-wrapper > .container-md, .page-wrapper > .container-lg, .page-wrapper > .container-xl, .page-wrapper > .container-xxl {
    max-width: 100%;
}
.page-wrapper > .page-breadcrumb {
    max-width: 100%;
}
.shoppico a.thumb {
    display: block;
    max-width: 80px;
    height: 60px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    overflow: hidden;
    border: 1px solid #ddd;
    background: rgba(255,255,255,1);
}
.shoppico a.thumb img {
    display: block;
    height: 100%;
    max-width: 100px;
    margin: 0 auto;
}
.nav.nav-tabs .home-tab a {
    border-top:1px solid #22ca80;
    color:#22ca80;
}
.nav.nav-tabs .home-tab a.active {
    color:#22ca80;
}
.btn-indigo{
    background: #8d21a6;
    border: 1px solid #8d21a6;
}
.btn-outline-indigo{
    background: #fff;
    color: #8d21a6;
    border: 1px solid #8d21a6;
}
.btn-outline-indigo:hover{
    background: #8d21a6;
    border: 1px solid #8d21a6;
}
.btn-indigo:hover {
    background: #8d21a6;
}
.nav.nav-tabs .pri-tab a {
    border-top:1px solid #8d21a6;
    color:#8d21a6;
}
.nav.nav-tabs .pri-tab a.active {
    color:#8d21a6;
}
.pri-color {
    color:#8d21a6;
}
.nav.nav-tabs .fav-tab a {
    border-top:1px solid #1c97de;
    color:#1c97de;
}
.nav.nav-tabs .trash-tab a {
    border-top:1px solid #e23d38;
    color:#e23d38;
}
.nav.nav-tabs .trash-tab a.active {
    color:#e23d38;
}
.nav.nav-tabs .fav-tab a.active {
    color:#1c97de;
}
.nav-tabs .nav-link {
    border:#ddd 1px solid;
}
.nav.nav-tabs .important-tab a{
    margin-top: -10px;
    padding-top: 18px;
}
.nav.nav-tabs .important-tab a.active{
    
}
.nav.nav-tabs .dynamic-tab a.active{
    border-top:#999 1px solid;
    border-left:#999 1px solid;
    border-right:#999 1px solid;
}
.nav.nav-tabs .dynamic-tab a{
    font-weight: 300;
}
.btn-light-info {
    background: #1c97de;
}
.btn-light-info:hover {
    background: #2884df;
}
.shoppico tr.priority td {
    background-color: rgb(179,128,237,0.13);
}
.shoppico tr.favourite td {
    background-color: rgb(74,205,246,0.13);
}
.sidebar-nav #sidebarnav .sidebar-item.selected-mod > .sidebar-link {
    border-radius: 0px;
    color: #fff !important;
    background: #EB3349;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #F45C43, #EB3349);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #F45C43, #EB3349); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    box-shadow: 0px 7px 12px 0px rgba(95, 118, 232, 0.21);
    opacity: 1;
}
.sidebar-nav #sidebarnav .sidebar-item.selected-new-filter > .sidebar-link {
    border-radius: 0px;
    color: #fff !important;
    background: #56CCF2;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #2F80ED, #56CCF2);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to left, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    box-shadow: 0px 7px 12px 0px rgba(95, 118, 232, 0.21);
    opacity: 1;
}
.badge-success {
    color: #fff;
    background-color: #28a745;
}
.badge-danger {
    color: #fff;
    background-color: #dc3545;
}
.badge-info {
    color: #fff;
    background-color: #007bff;
}
.badge-secondary {
    color: #fff;
    background-color: #6c757d;
}
</style>
</head>

<body>


    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Filters', 'action' => 'index']); ?>">
                            <img src="/backend/assets/images/logo.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <?= $this->element('backend/navbar/left_side_toggle_and_nav_items'); ?>
                    <?= $this->element('backend/navbar/right_side_toggle_and_nav_items'); ?>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?= $this->element('backend/sidebar/nav')?>
            </div>
        </aside>
        <div class="page-wrapper">
            <?= $this->Flash->render() ?>    
            <?= $this->fetch('content') ?>
            
            <footer class="footer text-center text-muted">
                <?= __('© shoppico - {0}.', date('Y'))?> <?= __('All rights reserved by <a href="{0}">{1}</a>. Admin Templates Designed and Developed by <a href="{2}">{3}</a>.', 'https://github.com/blueshark-pl/shoppico', 'Shoppico', 'https://demos.adminmart.com/free/bootstrap/freedash-lite/landingpage/index.html', 'Adminmart')?>
            </footer>
        </div>
        
    </div>
    <?= $this->element('Feedback.sidebar');?>
    <?= $this->fetch('script'); ?>
    <?= $this->element('backend/filters/add'); ?>
    <?= $this->element('backend/filters/manage'); ?>
    <?= $this->element('backend/subscriptions/payment'); ?>
    
    <style>
        #feedbackit-slideout_inner {
            background: #ffffff;
            border-radius: 0px;
            border: 1px solid #eee;
        }
        #feedbackit-slideout {
            background: #EB3349;
            background: -webkit-linear-gradient(to right, #F45C43, #EB3349);
            background: linear-gradient(to right, #F45C43, #EB3349);
            border-radius: 0px;
        }
    </style>
    <script src="/backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="/backend/dist/js/app-style-switcher.js"></script>
    <script src="/backend/dist/js/feather.min.js"></script>
    <script src="/backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/backend/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/backend/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="/backend/assets/extra-libs/c3/d3.min.js"></script>
    <script src="/backend/assets/extra-libs/c3/c3.min.js"></script>
    <script src="/backend/assets/libs/chartist/dist/chartist.min.js"></script>
    <!-- <script src="/backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> -->
    <script src="/backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/backend/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <!-- <script src="/backend/dist/js/pages/dashboards/dashboard1.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#add-filter-button').on('click', function(e) {
                e.preventDefault();
                
                var form = $('#FilterAddForm');
                var formData = form.serialize();
                console.log(form);
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: formData,
                    headers: {
                        'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken'); ?>" 
                    },
                    success: function(response) {
                        $('#ajax-response').html(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
        $(document).ready(function() {
            // Funkcja wywoływana po załadowaniu strony
            $('.filter-nav .nav-item-shoppico').click(function() {
                var filterId = $(this).attr('rel');
                $('#filter-table-' + filterId + " tbody").html(`<tr>
                    <th colspan="7" class="text-center">
                        <button class="btn btn-primary" type="button" disabled="">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <?= __('Loading...'); ?>
                        </button>
                    </td>
                </tr>`);
                $.ajax({
                    url: '<?= $this->Url->build(['plugin' => false, 'controller' => 'Filters', 'action' => 'ajaxFilterDetailListByFilterId']);?>',
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken'); ?>" 
                    },
                    data: { filter_id: filterId },
                    dataType: 'html',
                    success: function(response) {
                        $('#filter-table-' + filterId).html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('Wystąpił błąd AJAX: ' + error);
                    }
                });
            });
            $(document).on('click','.shoppico .add-to-fav',function(e){
                e.preventDefault();
                var filterDetailId = $(this).attr('data-id');
                var closestTr = $(this).closest('tr');
                var favBtn = $(this);
                $.ajax({
                    url: '<?= $this->Url->build(['plugin' => false, 'controller' => 'FilterDetails', 'action' => 'ajaxAddToFavourite']);?>',
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken'); ?>" 
                    },
                    data: { filter_detail_id: filterDetailId },
                    dataType: 'html',
                    success: function(response) {
                        if(response >= 200){
                            if(response == 201){
                                closestTr.addClass("favourite");
                                favBtn.addClass("btn-outline-info");
                                favBtn.removeClass("btn-info");
                            }else{
                                favBtn.addClass("btn-info");
                                favBtn.removeClass("btn-outline-info");
                                closestTr.removeClass("favourite");
                            }
                        }else{
                            console.log('Wystąpił błąd AJAX');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Wystąpił błąd AJAX: ' + error);
                    }
                });
            });
            $(document).on('click','.shoppico .add-to-trash',function(e){
                e.preventDefault();
                var filterDetailId = $(this).attr('data-id');
                var closestTr = $(this).closest('tr');
                $.ajax({
                    url: '<?= $this->Url->build(['plugin' => false, 'controller' => 'FilterDetails', 'action' => 'ajaxAddToTrash']);?>',
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken'); ?>" 
                    },
                    data: { filter_detail_id: filterDetailId },
                    dataType: 'html',
                    success: function(response) {
                        if(response == 200){
                            closestTr.addClass("bg-danger");
                            closestTr.hide(1000, function(){
                                this.remove(); 
                            });
                        }else{
                            console.log('Wystąpił błąd AJAX');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Wystąpił błąd AJAX: ' + error);
                    }
                });
            });
        });
    </script>
</body>

</html>