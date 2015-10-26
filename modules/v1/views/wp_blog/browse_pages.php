<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-hovered">
                        <tr class='btn-primary'>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Excerpt</th>
                            <th>Author</th>
                            <th>Content</th>
                        </tr>
                        <?php
                        $no=1;
                        //print_r($page_list);
                        foreach($page_list as $r){
                            $date=date('d-M-Y H:i:s',strtotime($r['dateCreated']));
                            echo "<tr style='font-weight:normal'>
                                    <td>{$no}</td>
                                    <td>{$date}</td>
                                    <td>{$r['title']}</td>
                                    <td>{$r['page_status']}</td>
                                    <td>{$r['excerpt']}</td>
                                    <td>{$r['wp_author_display_name']}</td>
                                    <td>".anchor(($r['page_status'] == 'publish')?$r['link']:$this->uri->uri_string().'#','Preview'/*,'class=\'btn btn-primary\' style=\'height:20px;padding-top:0px; \''*/).nbs(2)
                                         .anchor(get_link(1,2).'/edit_page/'.$r['page_id'],'Edit').
                                    "</td>
                                </tr>";
                            $no++;
                        }
                        ?>
                    </table>
                    <hr/>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <a href="<?=site_url(version(1).'/wp_blog')?>" class="btn btn-primary glyphicon glyphicon-home"></a>
                    <a href="#" class="btn btn-default glyphicon glyphicon-backward" onclick="history.back()"></a>
                </div>
                <div class="col-md-5"></div>
            </div>
            <?php
                //print_r($user);
            ?>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
