<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>MyShop 2.0</title>

  <meta name="_token" content="{{csrf_token()}}" />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   var analytics = <?php echo $gender; ?>

   google.charts.load('current', {'packages':['bar']});
         google.charts.setOnLoadCallback(drawChart);


   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);


    var options = {
         chart: {
           title: 'Etat du stock',
           subtitle: 'entree, stock et sortie',
         }
       };

       var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

              chart.draw(data, google.charts.Bar.convertOptions(options));
   }
  </script>
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  @notifyCss


  <script>
var x={{Auth::user()->connect}}
    if (x==0) {
      window.setTimeout("document.getElementById('logout-form').submit();",6);
  }

    function date_heure(id)
    {
            date = new Date;
            annee = date.getFullYear();
            moi = date.getMonth();
            mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
            j = date.getDate();
            jour = date.getDay();
            jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
            h = date.getHours();
            if(h<10)
            {
                    h = "0"+h;
            }
            m = date.getMinutes();
            if(m<10)
            {
                    m = "0"+m;
            }
            s = date.getSeconds();
            if(s<10)
            {
                    s = "0"+s;
            }
            resultat = jours[jour]+' '+j+' '+mois[moi]+' '+annee;
            document.getElementById(id).innerHTML = resultat;
            setTimeout('date_heure("'+id+'");','1000');
            return true;
    }
    </script>
    <script>
      function date_heure1(id)
      {
              date = new Date;
              annee = date.getFullYear();
              moi = date.getMonth();
              mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
              j = date.getDate();
              jour = date.getDay();
              jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
              h = date.getHours();
              if(h<10)
              {
                      h = "0"+h;
              }
              m = date.getMinutes();
              if(m<10)
              {
                      m = "0"+m;
              }
              s = date.getSeconds();
              if(s<10)
              {
                      s = "0"+s;
              }
              resultat = jours[jour]+' '+j+' '+mois[moi]+' '+annee;
              document.getElementById(id).innerHTML = resultat;
              setTimeout('date_heure1("'+id+'");','1000');
              return true;
      }
      </script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm" id="mybody">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand text-sm navbar-dark navbar-secondary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link"><i class="fas fa-user"></i> Mon compte</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a href="#" class="nav-link" id="date_heure"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-danger" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i
            class="fas fa-power-off"></i> Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/LOG.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MyShop 2.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/Default_User_Logo.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if((Auth::user()->connect==1))

                        @if((Auth::user()->etat==0))

                        <li class="nav-item">
                          <a href="/home" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
          Acceuil
                            </p>
                          </a>
                        </li>

                        <li class="nav-item">
                         <a href="/Information" class="nav-link">
                           <i class="nav-icon far fa-file-alt"></i>
                           <p>
          Information générale
                           </p>
                         </a>
                       </li>
                        <li class="nav-item">
                          <a href="/Stock" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
          Stock
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="/Vente" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                              Vente
                            </p>
                          </a>
                        </li>
                                  <li class="nav-item">
                                    <a href="/User" class="nav-link">
                                      <i class="nav-icon fas fa-users"></i>
                                      <p>
                                        Utilisateur
                                      </p>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="/Statistique" class="nav-link">
                                      <i class="nav-icon fas fa-chart-pie"></i>
                                      <p>
                        Statistique              </p>
                                    </a>
                                  </li>
              @endif
              @if((Auth::user()->etat==1))

          <li class="nav-item">
            <a href="/Vente" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Vente
              </p>
            </a>
          </li>
@endif

               @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- /.content-header -->
    <!-- Main content -->
    @include('notify::messages')

@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2020 <a href="#">Ispace corp</a>.</strong> Tout droit reservés.

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
@notifyJs


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript">window.onload = date_heure('date_heure');</script>
<script type="text/javascript">window.onload = date_heure1('date_heure1');</script>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>



<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script>
  $('#flash-overlay-modal').modal();
</script>
<!-- PAGE SCRIPTS -->
<!-- Categorie SCRIPTS -->
<script>
$('#editCat1').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var lib=button.data('libcat')
var id=button.data('id')
var modal=$(this)
modal.find('.modal-body #libmodeedit').val(lib);
modal.find('.modal-body #idmodeedit').val(id);
    })
</script>
<script>

$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');
    allWells.hide();
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');

});
</script>


<script language="javascript" type="text/javascript">
     window.setTimeout("document.getElementById('logout-form').submit();",500000);
</script>


<!-- Produit SCRIPTS -->


<script>
  $(function () {
    $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example3').DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example4').DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example5').DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example6').DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
<script src="{{ asset('jquery.maskedinput.min.js')}}"></script>

<script src="{{ asset('dist/js/pages/dashboard2.js')}}"></script>
<script>
$('#Mjr').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('id') // Extract info from data-* attributes
var qe = button.data('qe') // Extract info from data-* attributes
var idp = button.data('idp') // Extract info from data-* attributes

// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.s').val(recipient);
modal.find('.sq').val(qe);
modal.find('.sid').val(idp);

})
        $(function() {
            $('#ex-date').mask('99/99/9999', {
                placeholder: 'dd/mm/yyyy'
            });
            $('#ex-phone').mask('(+228) 99-99-99-99');
            $('#ex-phoneedit').mask('(+228) 99-99-99-99');

            $('#ex-phone2').mask('+186 999 999-9999');
            $('#ex-ext').mask('(999) 999-9999? x9999');
            $('#ex-credit').mask('****-****-****-****', {
                placeholder: '*'
            });
            $('#ex-tax').mask('99-9999999');
            $('#ex-currency').mask('$ 99.99');
            $('#ex-product').mask('a*-999-a999', {
                placeholder: 'a*-999-a999'
            });

            $.mask.definitions['~'] = '[+-]';
            $('#ex-eye').mask('~9.99 ~9.99 999');
        })
    </script>

  

</body>
</html>
