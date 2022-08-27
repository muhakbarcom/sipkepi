<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan Jobdesk</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">

                    <div class="col-md-8 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right" style="display: none;">
                        <form action="<?php echo site_url($search_page); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('laporan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div> <br>
                <div style="margin-bottom: 10px;margin-left:10px;margin-top:60px"><label for="filter">Filter Tanggal:</label></div>
                <div class="row" style="margin-bottom: 10px;margin-left:10px">
                    <form action="<?php echo base_url('laporan'); ?>" class="form-inline" method="post">
                        <div class="col input-group">
                            <!-- <label><b>Filter :</b></label> -->
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-calendar"></i></button></span>
                            <input type="text" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal">
                        </div>
                        <div class="col input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                                <i class="fas fa-chevron-right"></i></span>
                            <input type="text" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal">
                        </div>
                        <div class="col input-group">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-circle"></i> Submit</button>
                        </div>
                    </form>
                </div>
                <form method="post" action="<?= site_url('laporan/deletebulk'); ?>" id="formbulk">
                    <div class="mailbox-messages">
                        <table class="table table-hover" style="margin-bottom: 10px" style="width:100%">
                            <tr>
                                <!-- <th style="width: 10px;"><input type="checkbox" name="selectall" /></th> -->
                                <th>
                                    <center>No</center>
                                </th>
                                <th>Tanggal</th>
                                <th>Jumlah Jobdesk selesai</th>
                                <th>Jumlah jobdesk belum selesai</th>
                                <th>Total Jobdesk</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            <?php
                            foreach ($laporan_data as $laporan) :
                            ?>
                                <tr>

                                    <td>
                                        <center><?php echo ++$start ?></center>
                                    </td>
                                    <td><?php echo $laporan->tanggal ?></td>
                                    <td><?php echo $laporan->js ?></td>
                                    <td><?php echo $laporan->jbs ?></td>
                                    <td><?php echo $laporan->jml ?></td>

                                </tr>
                            <?php
                            endforeach
                            ?>


                        </table>
                    </div>

                </form>
                <div class="row">
                    <div class="col-md-6">
                        <!-- <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a> -->
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>