<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Instituto de Referência em Resíduos</title>
    <!-- core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('vendorirr/fontawesome-free-5.6.1-web/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/Buttons-1.5.4/css/buttons.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/multiselectdropdown/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/multiselectdropdown/css/select2-bootstrap4.css')}}">
    <link href="{{ asset('vendor/croppie/croppie.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('js/summernote/summernote-bs4.js') }}" ></script>
    <script src="{{ asset('js/summernote/lang/summernote-pt-BR.js') }}" ></script>
    <script src="{{ asset('vendor/multiselectdropdown/js/select2.full.js')}}"></script>
    <script src="{{ asset('vendor/multiselectdropdown/js/i18n/pt-BR.js')}}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/Buttons-1.5.4/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/Buttons-1.5.4/js/buttons.bootstrap4.js')}}"></script>
    <script src="{{ asset('vendor/datatables/Buttons-1.5.4/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendor/datatables/Buttons-1.5.4/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/Buttons-1.5.4/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/Buttons-1.5.4/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('vendor/croppie/croppie.js')}}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}" ></script>
    <script src="{{ asset('js/jquery.ct-truncate.js') }}" ></script>
</head>

<body style="padding-top: 0px;">

    <!-- Page Loader -->
    <div class="page-loader-wrapper" style="background-image: url('{{asset('images/logo-setapp-vector.png')}}'); background-position: center; background-position-y: 51.5% ; background-repeat: no-repeat; background-size: 35px;" id="pg-loader">
        <div class="loader">
            <div class="preloader pl-size-xl">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Aguarde o carregamento da página! =}</p>
        </div>
    </div>

    @include('inc.login.header')

    @yield('content')

    @include('inc.welcome.footer')

    
    {{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}" ></script> --}}

    <script type="text/javascript">
        $(window).ready(function(){
            $('#pg-loader').fadeOut("slow");
        });
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
    </script>
</body>
</html>