<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <?=form_open()?>
                <div class="row">
                    <h1>Halaman Baru</h1>
                    <hr>
                    <?php 
                        $res=$this->session->flashdata('page_report');
                        echo ($res)?'<div class="alert alert-success" role="alert">'.$res.'</div>':''; 
                        ?>
                    <br/><br/>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input name="title" class="form-control" placeholder="Judul">
                        </div>
                        <!--div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <?=form_dropdown('category',(isset($cat))?$cat:array(''=>'Tidak Ada'),'','class="form-control"')?>
                        </div-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <?php
                                echo form_dropdown('status',(isset($page_status))?$page_status:array(''=>'Tidak Ada'),'','class="form-control"');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kontent Page</label>
                            <?=form_textarea('content','','class="form-control"')?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <a href="<?=site_url(get_link(1,2))?>" class="btn btn-default glyphicon glyphicon-home"></a>
                        <a href="<?=site_url(get_link(1,2).'/browse_page')?>" class="btn btn-default glyphicon glyphicon-list"></a>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </div>
            <?=form_close()?>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>