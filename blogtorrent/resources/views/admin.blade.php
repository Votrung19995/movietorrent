<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản lý</title>
  <link rel="shortcut icon" href="{{asset('img/h5-new.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet"  href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- DROPZONE --}}
  <link rel="stylesheet"  href="{{asset('css/dropzone.css')}}">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
  <script src="{{ asset('js/dropzone.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
              @php
                     use App\Inventory;

                     $inventory = new Inventory;
                     if(!empty(session('inventory'))){
                        $inventory = session('inventory');
                     }
                     $error = session('err');
                @endphp

                @if (!empty($error))
                    @if($error == 'Vui lòng chọn ảnh và thử lại.' || $error == 'Lỗi đăng tin' || $error == 'Vui lòng upload file')
                      <div id="err" class="alert alert-warning alert-dismissible ms-warning" role="alert" style="position: absolute;top: 10%; right: 12px; z-index: 3;display: none"
                        <strong style="color: red"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Lỗi: </strong> {{$error}} 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                    @else
                      <div id="err" class="alert alert-success alert-dismissible ms-success" role="alert" style="position: absolute;top: 10%; right: 12px; z-index: 3;display: none"
                        <strong style="color: white"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Yeah: </strong> {{$error}} 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <script>
                        $('#err').fadeIn();
                        setTimeout(function(){ 
                            $('#err').fadeOut();
                            @php
                              session()->forget('err');    
                            @endphp
                        }, 4000);
                    </script>
                @endif
    </div>

<div class="wrapper">
    <!-- /.content-header -->
    @include('slidebar')
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-share-square-o" aria-hidden="true"></i> Đăng bài viết
                </h3>
                <ul class="nav nav-pills ml-auto p-2">
                  {{-- <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li> --}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{action('AdminController@post')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="english">Tiêu đề tiếng anh</label>
                      <input type="text" value="{{$inventory->english}}" name="english" class="form-control" placeholder="Vui lòng nhập vào (*)" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Tiêu đề tiếng việt</label>
                      <input type="text" value="{{$inventory->vietnamese}}" name="vn" class="form-control" placeholder="Vui lòng nhập vào (*)" required>
                    </div>
                    <div class="form-group col-md-12"> 
                      <label>Nội dung và hình ảnh</label>
                      <textarea class="form-control" name="content"  id="content" rows="4" required>{{$inventory->fullpath}}</textarea>
                      <small class="form-text text-muted">Bắt buộc thêm vào ảnh đại diện cho bài viết</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Điểm IDMB</label>
                        <input type="text" value="{{$inventory->idmb}}" name="score" class="form-control" placeholder="Vui lòng nhập vào (*)" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Năm sản xuất và phát hành</label>
                        <input type="text" value="{{$inventory->year}}" name="year" class="form-control" placeholder="Vui lòng nhập vào (*)" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="english">Chất lượng phim</label>
                        <select name="resolution" class="form-control">
                            @if($inventory->resolution == 'Bản đẹp (HD)')
                                <option selected = "selected">Bản đẹp (HD)</option>
                            @else
                                <option>Bản đẹp (HD)</option>
                            @endif

                            @if($inventory->resolution == 'Bản vừa (FHD)')
                                <option selected = "selected">Bản vừa (FHD)</option>
                            @else
                                <option>Bản vừa (FHD)</option>
                            @endif
                           
                            @if($inventory->resolution == 'Bản chất lượng kém (CAM)')
                                <option selected = "selected">Bản chất lượng kém (CAM)</option>
                            @else
                                <option>Bản chất lượng kém (CAM)</option>
                            @endif
                          
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Quốc gia</label>
                        <select name="global" class="form-control">
                            @foreach($globals as $global)
                              @if(!empty(session('globalName')))
                                @if(session('globalName')->name == $global->name) 
                                <option selected = "selected" value="{{$global->globalid}}">{{$global->name}}</option>
                                @else
                                  <option value="{{$global->globalid}}">{{$global->name}}</option>
                                @endif
                              @else
                                 <option value="{{$global->globalid}}">{{$global->name}}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Đánh giá phim</label>
                        <input type="text" value="{{$inventory->feedback}}" name="feedback" class="form-control" placeholder="Vui lòng nhập vào">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Thể loại phim</label>
                        <select name="category" class="form-control">
                            @foreach($categorys as $category)
                              @if(!empty(session('categoryName')))
                                  @if(session('categoryName')->name == $category->name) 
                                    <option selected = "selected" value="{{$category->categoryid}}">{{$category->name}}</option>
                                  @else
                                    <option value="{{$category->categoryid}}">{{$category->name}}</option>
                                  @endif
                              @else
                                 <option value="{{$category->categoryid}}">{{$category->name}}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Đạo diễn sản xuất</label>
                        <input type="text" value="{{$inventory->director}}" name="director" class="form-control" placeholder="Vui lòng nhập vào">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Thêm mới</label>
                        <select name="isadd" class="form-control">
                          @if($inventory->isadd == 'Phim mới')
                              <option selected = "selected">Phim mới</option>
                          @else
                              <option>Phim mới</option>
                          @endif

                          @if($inventory->isadd == 'Phim cập nhật')
                              <option selected = "selected">Phim cập nhật</option>
                          @else
                              <option>Phim cập nhật</option>
                          @endif
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Link trailer</label>
                      <input type="text" value="{{$inventory->trailer}}" name="trailer" class="form-control" placeholder="Vui lòng nhập vào">
                    </div>
                    <div class="form-group col-md-12"> 
                        <label for="english">Upload files (max 2 file)</label>
                        <div class="dropzone" id="my-dropzone" name="myDropzone"></div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" title="Đăng bài"><i class="fa fa-reply" aria-hidden="true"></i> Post bài</button>
                  <button type="button" onclick="clearCache()" style="margin-left: 15px; color: white" title="Xóa cache" class="btn btn-success"> <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa cache</button>
                  
                  <script>
                    function clearCache(){
                      window.location.href = "#";
                    }
                  </script>
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            {{-- SETING DROPZONE --}}
            <script type="text/javascript">
              Dropzone.options.myDropzone= {
                  url: '{{action('AdminController@post')}}',
                  headers: {
                      'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                  },
                  autoProcessQueue: true,
                  uploadMultiple: true,
                  parallelUploads: 5,
                  maxFiles: 2,
                  maxFilesize: 2,
                  acceptedFiles: ".torrent",
                  dictFileTooBig: 'Image is bigger than 5MB',
                  addRemoveLinks: true,
                  removedfile: function(file) {
                  var name = file.name;    
                  name =name.replace(/\s+/g, '-');    /*only spaces*/
                  $.ajax({
                       type: 'POST',
                       url: '{{action('AdminController@deleteFile')}}',
                       headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        },
                       data: "id="+name,
                       dataType: 'html',
                       success: function(data) {
                           $("#msg").html(data);
                       }
                  });
                 var _ref;
                 if (file.previewElement) {
                   if ((_ref = file.previewElement) != null) {
                     _ref.parentNode.removeChild(file.previewElement);
                   }
                 }
                 return this._updateMaxFilesReachedClass();
               },
               previewsContainer: null,
               hiddenInputContainer: "body",
              }
           </script>
            
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List posts</h3>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                          data-widget="chat-pane-toggle">
                    <i class="fa fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <input type="checkbox" value="" name="">
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="fa fa-clock-o"></i> 3 days</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="fa fa-clock-o"></i> 1 month</small>
                    <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-primary-gradient">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fa fa-map-marker mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="fa fa-calendar"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-info-gradient">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fa fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-success-gradient">
              <div class="card-header no-border">

                <h3 class="card-title">
                  <i class="fa fa-calendar"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
      CKEDITOR.replace( 'content', {
                   filebrowserBrowseUrl: '{{ asset('js/ckfinder/ckfinder.html') }}',
                   filebrowserImageBrowseUrl: '{{ asset('js/ckfinder/ckfinder.html?type=Images') }}',
                   filebrowserFlashBrowseUrl: '{{ asset('js/ckfinder/ckfinder.html?type=Flash') }}',
                   filebrowserUploadUrl: '{{ asset('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                   filebrowserImageUploadUrl: '{{ asset('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                   filebrowserFlashUploadUrl: '{{ asset('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'} );
  </script>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="#">VLMT</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Phiên bản admin thử nghiệm</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script  src="{{asset('plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>
