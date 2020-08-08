$(document).ready(function () {
  $('#formPost').submit(function(e) {
      e.preventDefault();
  });
  $("#thumbFile").change(function() {
  readURL(this);
});
});
function sidebarMenu__Inner(url) {
  var strArray = url.split("/");
  window.location.assign(url);
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#previewimg_thumb').attr('src', e.target.result);
      $('#previewimg_thumb').attr('height', 110);
      $('#previewimg_thumb').attr('width', 190);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
function createPostajax(tabiden) {
  var form = $('#formPost')[0];
  var data = new FormData(form);
  jQuery.each(jQuery('#formPost')[0].files, function(i, file) {
    data.append('file-'+i, file);
  });
  data.append('action', tabiden);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/author/post/create',
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: 'post',
    success:function (data) {
        alert("berhasil");
        console.log(data);
    },
    error:function (data) {
      alert('gagal');
        console.log(data);
    }
  });
}
