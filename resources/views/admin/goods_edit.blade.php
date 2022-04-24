<x-layout/>

<script type="text/javascript" charset="utf-8" src="/plugin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>

    <!-- 右 -->
    <div class="content">
        <div class="header">
            <h1 class="page-title">商品编辑</h1>
        </div>

        <!-- edit form -->
        <form action={{ url("/goods/update") }} method="post" id="tab" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value={{$good_detail->first()->id}}>
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#basic" data-toggle="tab">基本信息</a></li>
              <li role="presentation"><a href="#desc" data-toggle="tab">商品描述</a></li>
              <li role="presentation"><a href="#attr" data-toggle="tab">商品属性</a></li>
              <li role="presentation"><a href="#pics" data-toggle="tab">商品相册</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="basic">
                    <div class="well">
                        <label>商品名称：</label>
                        <input type="text" name="goods_name" value={{ $good_detail->first()->goods_name }} class="input-xlarge">
                        <label>商品价格：</label>
                        <input type="text" name="goods_price" value={{ $good_detail->first()->goods_price }} class="input-xlarge">
                        <label>商品数量：</label>
                        <input type="text" name="goods_number" value={{ $good_detail->first()->goods_number }} class="input-xlarge">
                        <label>商品logo：</label>
                        <input type="file" name="" value='' class="input-xlarge">
                        <label>商品分类：</label>
                        <select name="" class="input-xlarge">
                            <option value="">请选择一级分类</option>
                        </select>
                        <select name="" class="input-xlarge">
                            <option value="">请选择二级分类</option>
                        </select>
                        <select name="cate_id" class="input-xlarge">
                            <option value="">请选择三级分类</option>
                        </select>
                    </div>
                </div>
                <div class="tab-pane fade in" id="desc">
                    <div class="well">
                        <label>商品简介：</label>
                        <textarea id="editor" name="goods_introduce" rows="3" class="input-xlarge" style="width:1024px;height:500px;">{!! $good_detail->first()->goods_introduce !!}</textarea>


                    </div>
                </div>
                <div class="tab-pane fade in" id="attr">
                    <div class="well">
                        <label>商品类型：</label>
                        <select name="" class="input-xlarge">
                            <option value="2">电脑</option>
                            <option value="1">手机</option>
                        </select>
                        <div>
                            <label>商品品牌：</label>
                            <input type="text" name="" value="edit" class="input-xlarge">
                            <label>商品型号：</label>
                            <input type="text" name="" value="edit" class="input-xlarge">
                            <label>商品重量：</label>
                            <input type="text" name="" value="edit" class="input-xlarge">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="pics">
                    <div class="well">
                            <div>[<a href="javascript:void(0);" class="add">+</a>]商品图片：<input type="file" name="goods_pics[]" value="" class="input-xlarge"></div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">保存</button>
            </div>
        </form>
        <!-- footer -->
        <footer>
            <hr>
            <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
        </footer>
    </div>
    <script type="text/javascript">
        $(function(){
            var ue = UE.getEditor('editor');


            $('.add').click(function(){
                var add_div = '<div>[<a href="javascript:void(0);" class="sub">-</a>]商品图片：<input type="file" name="goods_pics[]" value="" class="input-xlarge"></div>';
                $(this).parent().after(add_div);
            });
            $('.sub').live('click',function(){
                $(this).parent().remove();
            });
        });
    </script>

