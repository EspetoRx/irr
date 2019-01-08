$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#item-img-output').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function readURL2(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#btn-img-id').removeClass('btn-secondary');
      $('#btn-img-id').addClass('btn-success');
      $('#btn-img-id').html('<i class=\"fa fa-camera-retro\"></i> Imagem <i class=\"fa fa-check-circle\"></i>');
    }

    reader.readAsDataURL(input.files[0]);
  }
}


function readURL3(input, cat) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#img-output-cat'+cat).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function readURL4(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#img-output-post').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#campImage").on('change', function() {

});

var $uploadCrop,
    tempFilename,
    rawImg,
    imageId;

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('.upload-demo').addClass('ready');
    $('#cropImagePop').modal('show');
      rawImg = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }else {
    swal("Desculpe. Seu browser não aceita a API de renderização de arquivo.");
  }
}

$uploadCrop = $('#upload-demo').croppie({
  viewport: {
    width: 225,
    height: 225,
    type: 'circle',
  },
  enforceBoundary: true,
  enableExif: true
});

$('#cropImagePop').on('shown.bs.modal', function(){
  // alert('Shown pop');
  $uploadCrop.croppie('bind', {
    url: rawImg
  }).then(function(){
    console.log('jQuery bind complete');
  });
});

$('.item-img').on('change', function () { 
  imageId = $(this).data('id'); tempFilename = $(this).val();
  $('#cancelCropBtn').data('id', imageId); readFile(this); 
});

$('#cropImageBtn').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'base64',
    format: 'jpeg',
    size: {width: 225, height: 225}
  }).then(function (resp) {
    $('#item-img-output').attr('src', resp);
    $('#cropImagePop').modal('hide');
    $('#photo_cropped').val(resp);
  });
});


function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}

$('#video').on('blur', function(){
    if($('#video').val() != '' && youtube_parser($('#video').val()) != false){
      $('#video-output-post').addClass('video-container');
      $('#video-output-post').html('<iframe style=\"width: 100%; height: 100%;\" src=\"https://www.youtube.com/embed/'+ youtube_parser($('#video').val()) +'\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');
    }else{
      $('#video-output-post').html('');
      $('#video').val('');
      $('#video-output-post').removeClass('video-container');
    }
});

$('#nav-home-tab'). on('click', function(){
  $('#midia').attr('value', '0');
  $('#img-output-post').attr('src', '');
  $('#photo').val('');
  $('#video-output-post').html('');
  $('#video').val('');
  $('#video-output-post').removeClass('video-container');
});

$('#nav-profile-tab'). on('click', function(){
  $('#midia').attr('value', '1');
  $('#video-output-post').html('');
  $('#video').val('');
  $('#video-output-post').removeClass('video-container');
});

$('#nav-contact-tab'). on('click', function(){
  $('#midia').attr('value', '2');
  $('#img-output-post').attr('src', '');
  $('#photo').val('');
});

