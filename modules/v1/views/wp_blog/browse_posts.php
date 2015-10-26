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
                            <th>Content</th>
                        </tr>
                        <?php
                        $no=1;
                        foreach($posts as $r){
                            $date=date('d-M-Y H:i:s',strtotime($r['post_date']));
                            echo "<tr style='font-weight:normal'>
                                    <td>{$no}</td>
                                    <td>{$date}</td>
                                    <td>{$r['post_title']}</td>
                                    <td>{$r['post_status']}</td>
                                    <td>{$r['post_excerpt']}</td>
                                    <td>".anchor(get_link(1,2).'/edit_post/'.$r['post_id'],'Lihat'/*,'class=\'btn btn-primary\' style=\'height:20px;padding-top:0px; \''*/)."</td>
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
