<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Upload To Picasa Web</h1>
                <hr><br/><br/>
                <div class="col-sm-3">
                    <img style="margin-left:20%;" src="http://lh3.googleusercontent.com/-Oqsn6DMwzso/VimigmAgtxI/AAAAAAAAAFM/Tuj13p9kzs0/logo_picasa.png" width="100px" />
                </div>
                <div class="col-sm-9">
					<?=form_open_multipart(version(1).'/picasa_upload/upload_photo')?>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Gunakan Akun</label>
					    <?=form_dropdown('use_account',array('default'=>'default'),'','class="form-control"')?>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Simpan Dg Nama</label>
					    <input name="filename" type="text" class="form-control" id="nama_file" placeholder="Masukkan Nama">
					  </div>
					  <div class="form-group">
					    <label for="input_file">Gambar</label>
					    <?=form_upload('file_data')?>
					    <p class="help-block">Pilih File Gambar [ *.jpg,*.png,*.bmp ]</p>
					  </div>
					  <a href="<?=site_url(version(1).'/')?>" class="btn btn-default glyphicon glyphicon-home"></a>
					  <button type="submit" class="btn btn-primary">Ambil Link</button>
					  <a href="<?=site_url(version(1).'/picasa_upload/galery')?>" class="btn btn-warning">Lihat Galery</a>
					<?=form_close()?>
					<?php
						echo ($this->session->flashdata('result'))?
							'<br><textarea class="form-control js-copytextarea" style="max-width:100%;height:35px">'.$this->session->flashdata('result').'</textarea>'.
							'<button class="btn btn-default glyphicon glyphicon-copy js-textareacopybtn"> Copy</button>'
							:'';
					?>
                </div>
					<script type="text/javascript">
						
							var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

							copyTextareaBtn.addEventListener('click', function(event) {
							  var copyTextarea = document.querySelector('.js-copytextarea');
							  copyTextarea.select();

							  try {
							    var successful = document.execCommand('copy');
							    var msg = successful ? 'successful' : 'unsuccessful';
							    console.log('Copying text command was ' + msg);
							  } catch (err) {
							    console.log('Oops, unable to copy');
							  }
							});
					</script>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->