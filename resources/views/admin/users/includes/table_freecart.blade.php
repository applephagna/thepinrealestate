<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkboxes and radio buttons customization (jQuery and Zepto) plugin</title>
  <meta charset="utf-8">
  <meta content="width=device-width" name="viewport">
  <link href="assets/icheck/demo/css/custom.css?v=1.0.2" rel="stylesheet">
  <link href="assets/icheck/skins/all.css?v=1.0.2" rel="stylesheet">
  {{-- <script src="assets/icheck/demo/js/jquery.js"></script> --}}
  <script src="vendor/jquery/jquery-3.1.1.min.js"></script>
  <script src="assets/icheck/icheck.js?v=1.0.2"></script>
</head>
<body>
  <div class="skin skin-square">
    <dl class="clear">
      <dd class="selected">
        <div class="skin-section">
          <ul class="list">
            <li>
              <input tabindex="17" type="checkbox" id="check-all">
              <label for="line-checkbox-1">Checkbox All / Uncheck</label>
            </li>            
            <li>
              <input tabindex="17" type="checkbox" class="chkcheck" >
              <label for="line-checkbox-1">Checkbox 1</label>
            </li>
            <li>
              <input tabindex="17" type="checkbox" class="chkcheck" >
              <label for="line-checkbox-2">Checkbox 2</label>
            </li>
            <li>
              <input tabindex="17" type="checkbox" class="chkcheck" >
              <label for="line-checkbox-3">Checkbox 3</label>
            </li>                        
            <li>
              <input tabindex="18" type="checkbox"  class="chkcheck" >
              <label for="line-checkbox-4">Checkbox 4</label>
            </li>
            <li>
              <input type="checkbox" id="line-checkbox-disabled" disabled>
              <label for="line-checkbox-disabled">Disabled</label>
            </li>
            <li>
              <input type="checkbox" id="line-checkbox-disabled-checked" checked disabled>
              <label for="line-checkbox-disabled-checked">Disabled &amp; checked</label>
            </li>
          </ul>
        </div>
      </dd>
    </dl> 
  </div>
  <script>
    $(document).ready(function(){
      var triggeredByChild = false;
        $('.skin-square input').iCheck({
          checkboxClass: 'icheckbox_square-green',
          radioClass: 'iradio_square-green',
          increaseArea: '20%'
        });

      $('#check-all').on('ifChecked', function (event) {
          $('.chkcheck').iCheck('check');
          triggeredByChild = false;
      });

      $('#check-all').on('ifUnchecked', function (event) {
          if (!triggeredByChild) {
              $('.chkcheck').iCheck('uncheck');
          }
          triggeredByChild = false;
      });
      // Removed the checked state from "All" if any checkbox is unchecked
      $('.chkcheck').on('ifUnchecked', function (event) {
          triggeredByChild = true;
          $('#check-all').iCheck('uncheck');
      });

      $('.chkcheck').on('ifChecked', function (event) {
          if ($('.chkcheck').filter(':checked').length == $('.chkcheck').length) {
              $('#check-all').iCheck('check');
          }
      });
    });
  </script>
</body>
</html>
