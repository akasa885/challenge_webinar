@extends('author.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-diamond icon-gradient bg-strong-bliss">
                        </i>
                    </div>
                    <div>List Post
                        <div class="page-title-subheading">This is an post panel that you can manage your posts
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="col-md-11 col-lg-11">
            <div class="mb-3 card">
              <div class="card-header-tab card-header-tab-animation card-header">
                  <div class="card-header-title">
                      <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                      Post List
                  </div>
                  <div class="btn-actions-pane-right">
                      <div class="nav">
                          <a href="{{route('author.post.viewForm')}}" class="border-0 btn-transition btn btn-outline-success">Add New Post</a>                          
                      </div>
                  </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="data_users_side" class="mb-0 table display" style="width:100%">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Thumbnail</th>
                              <th>Status</th>
                              <th>Created_at</th>
                              <th>Options</th>
                          </tr>
                      </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('optionalScript')
<script>
    $(function() {
        $('#data_users_side').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('author.post.dtb_post')}}",
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'pic_thumbnail',
                    name: 'thumbnail'
                },
                {
                    data: 'status_post',
                    name: 'status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'Options',
                    name: 'Options'
                }
            ]
        });
    });
</script>
@endsection
