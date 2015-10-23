<a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h1>Main Menu</h1>
                <hr>
                <div class="col-md-12" style=""><?=$this->session->flashdata('error')?></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="" style="margin-top:5%">
                        <form class="form-horizontal" method="POST">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                              <input name="email_user" type="email" class="form-control" placeholder="Email" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input name="pass_user" type="password" class="form-control" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> Remember me
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <a href="<?=site_url()?>" class="btn btn-default glyphicon glyphicon-home"></a>
                              <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->