<x-layout/>

    <!-- 右 -->
    <div class="content">
        <div class="header">
            <h1 class="page-title">商品详情</h1>
        </div>

        <div class="well">

            <label>商品名称：</label>
            <div>{{ $goods_detail->first()->goods_name }}</div>
            <label>商品价格：</label>
            <div>{{ $goods_detail->first()->goods_price }}</div>
            <label>商品数量：</label>
            <div>{{ $goods_detail->first()->goods_number }}</div>
            <label>商品图片：</label>
            <div><img src=""></div>
            <label>商品简介：</label>
            <div>{!! $goods_detail->first()->goods_introduce !!}</div>

        </div>
        <!-- footer -->
        <footer>
            <hr>
            <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
        </footer>
    </div>



