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
        background-color: #4194DC;
        color: #fff;
        cursor: pointer;
    }
    a.list-group-item:hover{
        color: white;
        text-decoration: none;
        background-color: #4194DC;
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
                $home_menu="
                <div class='list-group'>
                  <a href='".site_url()."' class='list-group-item'>Home</a>
                </div>";
                $user_menu="
                <div class='list-group'>
                  <a href='".site_url(get_link(1,2))."/browse_user' class='list-group-item'>Browse User</a>
                </div>";
                $post_menu="
                <div class='list-group'>
                  <a href='".site_url(get_link(1,2))."/new_post' class='list-group-item'>Create Post</a>
                  <a href='".site_url(get_link(1,2))."/browse_post' class='list-group-item'>Browse Post</a>
                </div>";
                $page_menu="
                <div class='list-group'>
                  <a href='".site_url(get_link(1,2))."/new_page' class='list-group-item'>Create Page</a>
                  <a href='".site_url(get_link(1,2))."/browse_page' class='list-group-item'>Browse Page</a>
                </div>";
                $category_menu="
                <div class='list-group'>
                  <a href='".site_url(get_link(1,2))."/list_category' class='list-group-item'>Create Category</a>
                  <a href='".site_url(get_link(1,2))."/list_category' class='list-group-item'>Browse Category</a>
                </div>";
                $komentar_menu="
                <div class='list-group'>
                  <a href='".site_url(get_link(1,2))."/comment_post' class='list-group-item'>Browse User</a>
                </div>";
                    $arr_link=array(
                            'glyphicon-home'=>array('Home',$home_menu),
                            'glyphicon-user'=>array('User',$user_menu),
                            'glyphicon-pencil'=>array('Posts',$post_menu),
                            'glyphicon-file'=>array('Halaman',$page_menu),
                            'glyphicon-star'=>array('Categories',$category_menu),
                            'glyphicon-comment'=>array('Komentar',$komentar_menu),
                        );
                    foreach ($arr_link as $icon => $link) {
                        # code...
                        echo 
                        '<div class="mm img img-rounded" data-container="body" data-toggle="popover" data-placement="bottom" data-content="'.$link[1].'" onclick="show_popup()">
                            <a class="img-rounded" style="padding:10px;">
                                <div class="m glyphicon '.$icon.' "></div>
                            </a>
                                <span class="col-md-12" style="text-align:center;">'.$link[0].'</span>
                        </div>';
                    }
                ?>
<script type="text/javascript">
function show_popup(){
    $(function () {
      $('[data-toggle="popover"]').popover({html:true})
    })
}
</script>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->