          <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="">The West Bengal State Cooperative Agriculture & Rural Development Bank Ltd.</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
 
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?=base_url();?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?=base_url();?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?=base_url();?>js/off-canvas.js"></script>
  <script src="<?=base_url();?>js/hoverable-collapse.js"></script>
  <script src="<?=base_url();?>js/template.js"></script>
  <script src="<?=base_url();?>js/settings.js"></script>
  <script src="<?=base_url();?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url();?>js/data-table.js"></script>
  <!-- End custom js for this page-->

        <script>
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
h=checkTime(h);
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</body>
</html>
