  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- /.card -->
            <div class="row">

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <?php foreach ($capster as $item): ?>
                      <li>
                        <img src="<?= base_url()?>/asset/vendor/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="javascript:void(0)" onClick="viewCapster(<?= !empty($item['id']) ? $item['id'] : 0; ?>)"><?= !empty($item['nama']) ? $item['nama'] : 'Capster'; ?></a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <?php endforeach ?>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>

    <script>
      function viewCapster(param){
        $('#viewCapsterModal').modal('show')
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>admin/viewCapster',
            data: {id: param},
            dataType: "json",
            success: function(response){
              if (response.error == 0) {
                console.log(response);
                $('#viewCapsterName').html(response.result.nama);
                $('#viewCapsterTelp').html(response.result.no_tlp);
                } else {
                  console.log(response.result);
                }
            }
        });
      }
    </script>