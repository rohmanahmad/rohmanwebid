<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Main Menu</h1>
                <hr><br/><br/>
                <div class="col-sm-12">
                    <?php
                    $arr_content=array(
                                        //'LINK'=>array('label','image')
                                        version(1).'/picasa_upload'=>array('Manage Photos','http://lh3.googleusercontent.com/-PLqXaOo3T5s/VjCiTnVKCXI/AAAAAAAAAGQ/BjG0FC5k4rU/picasa_logo.jpg'),
                                        version(1).'/wp_blog'=>array('Manage Blogs','http://lh3.googleusercontent.com/-_EEhJiW3t7w/VimkjiWg4yI/AAAAAAAAAFY/mQ7hEhZVJpc/wordpress_logo.png'),
                                        //'LINK'=>array('image','label'),
                                    );
                    foreach($arr_content as $link=>$content){
                        echo '
                            <div class="list-group" style="width:130px;float:left;margin:2px;">
                            <a class="list-group-item" style="height:130px;">
                            <img role="presentation" class="img-thumnail" style="margin:0%;" src="'.$content[1].'" width="100px" />
                            </a>
                            <a href="'.site_url($link).'" class="list-group-item btn-primary" >'.$content[0].'</a>
                            </div> 
                        ';
                    }
                    ?>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->