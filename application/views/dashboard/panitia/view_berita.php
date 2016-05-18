
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
									<form method="post">
										<textarea id="berita" name="berita"></textarea>
									</form>
								</div>
							</div>
						</div>

                        <!-- End row -->
                        
                        


                    </div> <!-- container -->
                               
                </div> <!-- content -->