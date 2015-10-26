<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table">
                        <tr class='btn-primary'>
                            <th>No</th>
                            <th>Display</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Level</th>
                            <th>Registered</th>
                        </tr>
                        <?php
                        $no=1;
                        foreach($user as $r){
                            $reg=date('d-M-Y H:i:s',strtotime($r['registered']));
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$r['nicename']}</td>
                                    <td>{$r['username']}</td>
                                    <td>{$r['email']}</td>
                                    <td>{$r['first_name']}</td>
                                    <td>{$r['last_name']}</td>
                                    <td>{$r['roles'][0]}</td>
                                    <td>{$reg}</td>
                                </tr>";
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
