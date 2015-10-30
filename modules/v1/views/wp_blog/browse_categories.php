<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <?php 
            //print_r($this->session->all_userdata());
            $res=$this->session->flashdata('posting_report');
            echo ($res)?'<div class="alert alert-success" role="alert">'.$res.'</div>':''; 
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-hovered">
                        <tr class='btn-primary'>
                            <th>No</th>
                            <th>ID</th>
                            <th>ID Parent</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Content </th>
                            <th><?=anchor(get_link(1,2).'/new_category',' ','class="glyphicon glyphicon-plus-sign" style="font-size:12px;color:#fff"')?></th>
                        </tr>
                        <?php
                        $no=1;
                        //print_r($categories);
                        foreach($categories as $r){
                            echo "<tr style='font-weight:normal'>
                                    <td>{$no}</td>
                                    <td>{$r['categoryId']}</td>
                                    <td>{$r['parentId']}</td>
                                    <td>{$r['categoryName']}</td>
                                    <td>{$r['categoryDescription']}</td>
                                    <td colspan=2>".anchor($r['htmlUrl'],'Lihat').nbs(2)
                                         .anchor(get_link(1,2).'/edit_category/'.$r['categoryId'],'Edit'/*,'class=\'btn btn-primary\' style=\'height:20px;padding-top:0px; \''*/)."</td>
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
                    <a href="<?=site_url(version(1).'/wp_blog')?>" class="btn btn-primary glyphicon glyphicon-home" title="Home"></a>
                    <a href="#" class="btn btn-default glyphicon glyphicon-backward" onclick="history.back()" title="Kembali"></a>
                    <a href="<?=site_url(get_link(1,2).'/new_category')?>" class="btn btn-default glyphicon glyphicon-plus-sign" title="Buat Baru"></a>
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
