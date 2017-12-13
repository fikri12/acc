
                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">CASH POSITION</span>
                                    <span class="info-box-number">
                                      <?php
                                        $this->db->order_by("date_add","desc");
                                        $this->db->limit(1, 0);
                                        echo number_format($this->db->get("tcashflow")->first_row()->posisi);
                                      ?>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pengajuan Biaya</span>
                                    <span class="info-box-number">
                                      <?php
                                        $d = $this->db->get("xpengajuan")->result();
                                        echo number_format(count($d));
                                       ?>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Approved</span>
                                    <span class="info-box-number">
                                      <?php
                                        $d = $this->db->get_where("xpengajuan",array("position"=>"7"))->result();
                                        echo number_format(count($d));
                                       ?>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
