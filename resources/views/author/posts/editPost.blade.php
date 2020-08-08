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
                    <div>Edit Your Post
                        <div class="page-title-subheading">You felt wrong? Edit it now!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="mb-3 card">
              <div class="card-header-tab card-header-tab-animation card-header">
                  <div class="card-header-title">
                      <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                      Post Panel
                  </div>
                  <div class="btn-actions-pane-right">
                      <div class="nav">
                          <a href="javascript:void(0)" class="border-0 btn-transition btn btn-outline-success">Publish</a>                          
                          <a href="javascript:void(0)" class="border-0 btn-transition  btn btn-outline-danger">Cancel</a>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                <h2>Your Title</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="mb-3 card">
              <div class="card-header-tab card-header-tab-animation card-header">
                  <div class="card-header-title">
                      <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                      Content
                  </div>
              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="mb-3 card">
              <div class="card-header-tab card-header-tab-animation card-header">
                  <div class="card-header-title">
                      <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                      Environment
                  </div>

                  <div class="card-body">

                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
