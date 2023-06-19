<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Aplikasi Surat | {{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">    

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">        

    <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">  
    <link rel="stylesheet" href="/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

    <script src="/assets/modules/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({

            selector: 'textarea#konten',
            menubar: "",
            plugins: [

                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',

                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',

                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'

            ],
            toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +

                'bullist numlist checklist outdent indent | removeformat | code table help'

        })
    </script>
    
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('sweetalert::alert')

            @include('dashboard.partials.navbar')

            @include('dashboard.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">

                @yield('container')
                
            </div>            
            <footer class="main-footer">
                <div class="text-center">
                    Copyright &copy; 2023 <div class="bullet"></div> Kevin Pandoh</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>
    
    <!-- General JS Scripts -->
  <script src="/assets/modules/jquery.min.js"></script>
  <script src="/assets/modules/popper.js"></script>
  <script src="/assets/modules/tooltip.js"></script>
  <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/assets/modules/moment.min.js"></script>
  <script src="/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="/assets/js/page/forms-advanced-forms.js"></script>
  <script src="/assets/js/page/features-post-create.js"></script>    

    <!-- Template JS File -->    
    <script src="/assets/js/custom.js"></script>    
    <script src="/assets/js/scripts.js"></script>    
</body>

</html>