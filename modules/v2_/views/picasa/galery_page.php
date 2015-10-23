<style type="text/css">
	li{

	}
</style>
<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Upload To Picasa Web</h1>
                <hr><br/><br/>
                <div class="col-xs-3 hidden-xs">
                    <img style="margin-left:20%;" src="https://lh3.googleusercontent.com/-ryEJ6pI_lzE/ViXdPtz8P8I/AAAAAAAAABU/u6_vhLB-Phg/s177-Ic42/picasa-rohmanweb.png" width="100px" />
                </div>
                <div class="col-sm-9">
					<div class="row">
						<div class="col-md-12 nav nav-pills" style="max-height:300px;overflow:auto">
							<?php
								$userid = 'rohmanwebid%40googlemail.com';

								// build feed URL
								$feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid?kind=photo";

								// read feed into SimpleXML object
								$sxml = simplexml_load_file($feedURL);

								// get album name and number of photos
								$counts = $sxml->children('http://a9.com/-/spec/opensearchrss/1.0/');
								$total = $counts->totalResults; 
								   
								foreach ($sxml->entry as $entry) {
								  $title = $entry->title;
								  $summary = $entry->summary;
								  
								  $gphoto = $entry->children('http://schemas.google.com/photos/2007');
								  $size = $gphoto->size;
								  $height = $gphoto->height;
								  $width = $gphoto->width;
								  
								  $media = $entry->children('http://search.yahoo.com/mrss/');
								  $thumbnail = $media->group->thumbnail[1];
								  $tags = $media->group->keywords;
								  echo '
										  	<img role="presentation" onclick="set_value(\''.$thumbnail->attributes()->{'url'}.'\')" class="btn img-thumnail" style="margin:0%;" src="'.$thumbnail->attributes()->{'url'}.'" width="100px" />
										  ';
								}
							?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							<a href="<?=site_url('v2/picasa_upload')?>" class="btn btn-primary">Upload Baru</a>
						</div>
						<div class="col-md-10">
							<textarea class="form-control js-copytextarea"></textarea>
							<button class="btn js-textareacopybtn"><i class="glyphicon glyphicon-copy"></i> Copy</button>
						</div>
					</div>

                </div><!-- col-sm-9 -->
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
    <script type="text/javascript">
	    function set_value($value){
	    	$("textarea").val($value);
	    }
	
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