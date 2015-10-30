<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <?=form_open()?>
                <div class="row">
                    <h1>Kategori Baru</h1>
                    <hr>
                    <?php 
                        $res=$this->session->flashdata('page_report');
                        echo ($res)?'<div class="alert alert-success" role="alert">'.$res.'</div>':''; 
                        ?>
                    <br/><br/>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input name="categoryName" class="form-control" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Parent</label>
                            <?php
                                echo form_dropdown('categoryParent',(isset($cat))?$cat:array(''=>'Tidak Ada'),'','class="form-control"');
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <?=form_textarea('categoryDescription','','class="form-control"')?>
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
