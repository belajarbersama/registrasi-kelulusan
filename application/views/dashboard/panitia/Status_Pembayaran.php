<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title">{page}</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Pendaftar</a>
									</li>
									<li class="active">
										Pembayaran
									</li>
								</ol>
							</div>
						</div>

                        	
						<!--Custom Toolbar-->
						<!--===================================================-->
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
									<p class="text-muted font-13">
										&nbsp;
									</p>
									
									<button id="kirim_sms" class="btn btn-danger" disabled><i class="fa fa-times m-r-5"></i>Kirim SMS</button>
									<table id="demo-custom-toolbar"  data-toggle="table"
										   data-toolbar="#kirim_sms"
										   data-search="true"
										   data-show-refresh="true"
										   data-show-toggle="true"
										   data-show-columns="true"
										   data-sort-name="id"
										   data-page-list="[5, 10, 20]"
										   data-page-size="5"
										   data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
										<thead>
											<tr>
												<th data-field="state" data-checkbox="true"></th>
												<th data-field="no" data-sortable="true">No</th>
												<th data-field="nama" data-sortable="true">Nama</th>
												<th data-field="alamat" data-sortable="true">Alamat</th>
												<th data-field="no_hp" data-align="center" data-sortable="true">No. HP</th>
												<th data-field="email" data-align="center" data-sortable="true">Email</th>
												<th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Status</th>
											</tr>
										</thead>
										
										<tbody>
											<?php
												$no = 1;
												foreach ($data_pembayaran as $key => $value) {
													?>
												<tr>
													<td></td>
													<td><?php echo $no++;?></td>
													<td><?php echo $value->nama_pendaftar;?></td>
													<td><?php echo $value->alamat_pendaftar;?></td>
													<td><?php echo $value->no_hp;?></td>
													<td><?php echo $value->email_pendaftar;?></td>
													<td><?php echo $value->status_bayar;?></td>
												</tr>
													<?php
												}
											?>																					
										</tbody>
									</table>
								</div>
							</div>
						</div>
							

                    </div> <!-- container -->
                               
                </div> <!-- content -->