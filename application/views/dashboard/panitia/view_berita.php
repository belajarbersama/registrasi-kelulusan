
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  	tinymce.init({
  		selector:'textarea#berita',
  		height:300,
        plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        theme: 'modern',
        table_toolbar : "tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol"
  	});
</script>

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
                                    <li><a href="#">Registrasi</a></li>
                                    <li><a href="#">Berita</a></li>
                                    <li class="active">Buat Berita</li>
                                </ol>
                            </div>
                        </div>
                        
                        
                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box">
                                    <?php
                                        $attributes = array(
                                            'method' => 'post'
                                        );

                                        echo form_open('Panitia_C/buat_berita',$attributes);

                                        ?>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Judul Berita</label>
                                                <div class="col-md-10">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'judul_berita',
                                                            'id' => 'judul_berita'
                                                        );

                                                        echo form_input($attributes);

                                                        echo form_error('judul_berita','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Berita</label>
                                                <div class="col-md-10">
                                                    <?php
                                                        $textarea = array(
                                                            'id' => 'berita',
                                                            'name' => 'berita'
                                                        );

                                                        echo form_textarea($textarea);
                                                    ?>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        <?php

                                        echo form_close();
                                    ?>
								</div>
							</div>
						</div>
                        <!-- End row -->
                    </div> <!-- container -->
                </div> <!-- content -->