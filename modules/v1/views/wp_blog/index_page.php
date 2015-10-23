<style type="text/css">
    .m{
        font-size:5em;
        border:0px solid;
        padding:10px;
        margin-left:10px;
        margin-top:10px;
    }
    .mm{
        width:140px;
        border:1px solid;
        height:150px;
        float: left;
        margin: 10px;
    }
    .mm:hover{
        background-color: #22CC1A;
    }
</style>
<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Main Menu</h1>
                <hr><br/><br/>
                <div class="col-sm-12">
                <?php
                    $arr_link=array(
                            'glyphicon-home'=>array('','Home'),
                            'glyphicon-user'=>array(get_link(1,2).'/user_post','User'),
                            'glyphicon-pencil'=>array(get_link(1,2).'/new_post','Post Baru'),
                            'glyphicon-file'=>array(get_link(1,2).'/new_page','Halaman Baru'),
                            'glyphicon-list'=>array(get_link(1,2).'/list_post','Daftar Post'),
                            'glyphicon-star'=>array(get_link(1,2).'/category_post','Categories'),
                            'glyphicon-comment'=>array(get_link(1,2).'/comment_post','Komentar'),
                        );
                    foreach ($arr_link as $icon => $link) {
                        # code...
                        echo 
                        '<div class="mm img img-rounded">
                            <a href="'.site_url($link[0]).'" class="img-rounded" style="padding:10px;">
                                <div class="m glyphicon '.$icon.' "></div>
                            </a>
                                <span class="col-md-12" style="text-align:center;">'.$link[1].'</span>
                        </div>';
                    }
                ?>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->