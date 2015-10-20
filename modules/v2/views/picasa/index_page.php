<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Upload To Picasa Web</h1>
                <hr><br/><br/>
                <div class="col-sm-3">
                    <img style="margin-left:20%;" src="https://lh3.googleusercontent.com/-ryEJ6pI_lzE/ViXdPtz8P8I/AAAAAAAAABU/u6_vhLB-Phg/s177-Ic42/picasa-rohmanweb.png" width="100px" />
                </div>
                <div class="col-sm-9">
					<form>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Gunakan Akun</label>
					    <?=form_dropdown('use_account',array('rohman'=>'default'),'','class="form-control"')?>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Simpan Dg Nama</label>
					    <input name="filename" type="text" class="form-control" id="nama_file" placeholder="">
					  </div>
					  <div class="form-group">
					    <label for="input_file">Gambar</label>
					    <input name="file" type="file" id="input_file">
					    <p class="help-block">Pilih File Gambar [ *.jpg,*.png,*.bmp ]</p>
					  </div>
					  <button type="submit" class="btn btn-primary">Ambil Link</button>
					  <a href="<?=site_url('v2/picasa_upload/galery')?>" class="btn btn-default">Lihat Galery</a>
					</form>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->