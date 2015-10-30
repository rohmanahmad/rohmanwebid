<style type="text/css">
	li{

	}
</style>
<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Gallery Picasa Web</h1>
                <hr><br/><br/>
                <div class="col-xs-3 hidden-xs">
                    <img style="margin-left:20%;" src="http://lh3.googleusercontent.com/-coy9AfY3clo/VjChTm5Z6xI/AAAAAAAAAGE/ee2pXqhoyak/s200-Ic42/picasa_logo.png" width="100px" />
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
								  $title = substr($entry->{'title'},0,10);
								  $summary = $entry->summary;
								  
								  $gphoto = $entry->children('http://schemas.google.com/photos/2007');
								  $size = $gphoto->size;
								  $height = $gphoto->height;
								  $width = $gphoto->width;
								  
								  $media = $entry->children('http://search.yahoo.com/mrss/');
								  $thumbnail = $media->group->thumbnail[1];
								  $tags = $media->group->keywords;
								  echo '
										 <div class="list-group" style="width:130px;float:left;margin:2px;">
										  <a class="list-group-item" style="height:130px;">
										  <img role="presentation" class="img-thumnail" style="margin:0%;" src="'.$thumbnail->attributes()->{'url'}.'" width="100px" />
										  </a>
										  <a class="list-group-item btn-primary" onclick="set_value(\''.$thumbnail->attributes()->{'url'}.'\')">'.$title.'</a>
										 </div>	
										';
								}
							?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							<a href="<?=site_url(version(1).'/')?>" class="btn btn-default glyphicon glyphicon-home"></a>
							<a href="<?=site_url(version(1).'/picasa_upload')?>" class="btn btn-primary">Upload</a>
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