<div class="span3" id="">
    <div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-right">
                    <h4><i class="icon-plus-sign"></i> Upload Downloadable Materials</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="" id="add_downloadble" method="post" enctype="multipart/form-data" name="upload">
                        <div class="control-group">
                           
                            <div class="controls">


                                <input title="Your File Name" name="uploaded_file" class="input-file uniform_on" id="fileInput" type="file" accept=".jpg, .jpeg, .png, .pptx, .ppt, .doc, .docx, .pdf " required>

                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>" />
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="text" name="name" Placeholder="File Name"  class="input" required>
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="text" name="desc" Placeholder="Description" class="input" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn btn-info"><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>

                    <script>
                        jQuery(document).ready(function($) {
                            $("#add_downloadble").submit(function(e) {
                                $.jGrowl("Uploading File Please Wait......", {
                                    sticky: true
                                });
                                e.preventDefault();
                                var _this = $(e.target);
                                var formData = new FormData($(this)[0]);
                                $.ajax({
                                    type: "POST",
                                    url: "upload_save.php",
                                    data: formData,
                                    success: function(html) {
                                        $.jGrowl("File Successfully  Added", {
                                            header: 'File Added'
                                        });
                                        setTimeout(function() {
                                            window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
                                        }, 2000)
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false
                                });
                            });
                        });
                        var file = document.getElementById('fileInput');

                        file.onchange = function(e) {
                            var ext = this.value.match(/\.([^\.]+)$/)[1];
                            switch (ext) {
                                case 'jpg':
                                case 'ppt':
                                case 'pptx':
                                
                                case 'tif':
                                case 'doc':
                                case 'docx':
                                case 'pdf':
                                case 'mp4':

                                    break;
                                default:
                                    $.jGrowl('File is not permitted to Upload You can Only Upload (jpg,ppt,pptx,tif,doc,docx,gif,mp4)');
                                    this.value = '';
                            }
                        };
                        $(document).ready(function() {
                            maxFileSize=200 * 1024 * 1024;
                            $("#fileInput").change(function(){
                                fileSize=this.files[0].size;

                                if (fileSize > maxFileSize){
                                    $.jGrowl('You can Only Upload only files under 200MB');
                                    this.value='';
                                }
                            });

                                                });
                    </script>
                </div>
            </div>
        </div>
        <!-- /block -->


    </div>
</div>