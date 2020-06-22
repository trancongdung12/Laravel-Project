<!-- Hiệu ứng load -->
<style>
/*dùng ảnh gif*/

.load {
    width: 100%;
    height: 100%;
    background: #fff;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100000000000;
    display: block;
    overflow: hidden;
}

.load img {
    width: 150px;
    height: 150px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -75px;
    margin-left: -75px;
}
</style>
<div class="preloading">
    <div class="load">
        <img src="storage/public/loading.gif">
    </div>
</div>
<script>
     $(window).on('load', function(event) {
            $('body').removeClass('preloading');
            $('.load').delay(1000).fadeOut('fast');
                });
</script>
