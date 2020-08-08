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
                    <div>Create New Post
                        <div class="page-title-subheading">Enter your information about your being post
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
                          <a href="javascript:void(0)" onclick="createPostajax(1)" class="border-0 btn-transition btn btn-outline-success">Publish</a>
                          <a href="javascript:void(0)" onclick="createPostajax(0)" class="mr-1 ml-1 border-0 btn-transition  btn btn-outline-primary">Save Draft</a>
                          <a href="javascript:void(0)" class="border-0 btn-transition  btn btn-outline-danger">Cancel</a>
                      </div>
                  </div>
              </div>
              <form id="formPost" method="post" enctype="multipart/form-data">
                          <div class="card-body">
                            <div class="position-relative form-group">
                              <label for="postHeader" class="">Enter Your Title</label>
                              <input name="titleHeader" id="postHeader" placeholder="Your Post Title" type="text" required class="form-control" maxlength="50">
                            </div>
                            <div class="position-relative form-group">
                              <label for="thumbFile" class="">Thumbnail Image</label>
                              <div class="row">
                                <div class="col-sm-4">
                                  <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                    <img id="previewimg_thumb" src="{{ asset('/images/default/no-image.png') }}" alt="" />
                                  </div>
                                  <!-- <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                  </div> -->
                                </div>
                                <div class="col-sm-8">
                                  <input name="headThumbnail" id="thumbFile" type="file" class="form-control-file">
                                    <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                </div>
                              </div>
                            </div>
                            <div class="position-relative form-group">
                              <label for="postAbstract" class="">Abstract</label>
                              <textarea name="excerpt" id="postAbstract" placeholder="Abstract about your post"  required class="form-control" maxlength="200" required> </textarea>
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
                                  Content
                              </div>
                          </div>
                          <div class="card-body">
                            <textarea name="description" id="description"
                            class="summernote" required></textarea>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-12 col-lg-4">
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
                      </div> -->
                    </div>
              </form>
    </div>
</div>
@endsection

@section('optionalScript')
<script>
$(document).ready(function(){
  $('.summernote').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                $('body > .note-popover').hide();
                }
             },
         });
});
</script>
@endsection
