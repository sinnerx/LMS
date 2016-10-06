

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
    //console.log('testt');
    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('person/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});
//<script>
</script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/multi/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/multi/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/multi/js/prettify.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/multi/js/multiselect.min.js"></script>
</body>

 <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','localhost/montecarlo/assets/js/analytics.js','ga');
    
    ga('create', 'UA-39934286-1', 'github.com');
    ga('send', 'pageview');
  </script>
    
  <script type="text/javascript">
  $(document).ready(function() {
    // make code pretty
    window.prettyPrint && prettyPrint();
    
    if ( window.location.hash ) {
      scrollTo(window.location.hash);
    }
    
    $('.nav').on('click', 'a', function(e) {
      scrollTo($(this).attr('href'));
    });

    $('#multiselect').multiselect();

    $('[name="q"]').on('keyup', function(e) {
      var search = this.value;
      var $options = $(this).next('select').find('option');

      $options.each(function(i, option) {
        if (option.text.indexOf(search) > -1) {
          $(option).show();
        } else {
          $(option).hide();
        }
      });
    });

    $('#search').multiselect({
      search: {
        left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
      }
    });

    $('.multiselect').multiselect();
    $('.js-multiselect').multiselect({
      right: '#js_multiselect_to_1',
      rightAll: '#js_right_All_1',
      rightSelected: '#js_right_Selected_1',
      leftSelected: '#js_left_Selected_1',
      leftAll: '#js_left_All_1'
    });

    $('#keepRenderingSort').multiselect({
      keepRenderingSort: true
    });

    $('#undo_redo').multiselect();

    $('#multi_d').multiselect({
      right: '#multi_d_to, #multi_d_to_2',
      rightSelected: '#multi_d_rightSelected, #multi_d_rightSelected_2',
      leftSelected: '#multi_d_leftSelected, #multi_d_leftSelected_2',
      rightAll: '#multi_d_rightAll, #multi_d_rightAll_2',
      leftAll: '#multi_d_leftAll, #multi_d_leftAll_2',

      moveToRight: function(Multiselect, options, event, silent, skipStack) {
        var button = $(event.currentTarget).attr('id');

        if (button == 'multi_d_rightSelected') {
          var left_options = Multiselect.left.find('option:selected');
          Multiselect.right.eq(0).append(left_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.right.eq(0).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(0));
          }
        } else if (button == 'multi_d_rightAll') {
          var left_options = Multiselect.left.find('option');
          Multiselect.right.eq(0).append(left_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.right.eq(0).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(0));
          }
        } else if (button == 'multi_d_rightSelected_2') {
          var left_options = Multiselect.left.find('option:selected');
          Multiselect.right.eq(1).append(left_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.right.eq(1).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(1));
          }
        } else if (button == 'multi_d_rightAll_2') {
          var left_options = Multiselect.left.find('option');
          Multiselect.right.eq(1).append(left_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.right.eq(1).eq(1).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(1));
          }
        }
      },

      moveToLeft: function(Multiselect, options, event, silent, skipStack) {
        var button = $(event.currentTarget).attr('id');

        if (button == 'multi_d_leftSelected') {
          var right_options = Multiselect.right.eq(0).find('option:selected');
          Multiselect.left.append(right_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
          }
        } else if (button == 'multi_d_leftAll') {
          var right_options = Multiselect.right.eq(0).find('option');
          Multiselect.left.append(right_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
          }
        } else if (button == 'multi_d_leftSelected_2') {
          var right_options = Multiselect.right.eq(1).find('option:selected');
          Multiselect.left.append(right_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
          }
        } else if (button == 'multi_d_leftAll_2') {
          var right_options = Multiselect.right.eq(1).find('option');
          Multiselect.left.append(right_options);

          if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
            Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
          }
        }
      }
    });
  });
  
  function scrollTo( id ) {
    if ( $(id).length ) {
      $('html,body').animate({scrollTop: $(id).offset().top - 40},'slow');
    }
  }
  
  </script>


  <!--<script type="text/javascript" src="jquery-1.10.2.min.js"></script>-->

<script>

$(document).ready(function(){
  
  $('#add').click(function(){
    
    var inp = $('#box');
    
    
    var i = $('input').size() ;
    var s = $('input').size() ;
    
    //$('<div id="box' + i +'"><div class="form-group"><label class="col-sm-2 control-label">Answer</label><div class="col-md-5"><input type="text" id="a_text[' + i +']" class="form-control" name="a_text1[' + i +']" /></div><img src="<?php echo base_url(); ?>assets/add/remove.png" align="top" class="add" id="remove" /></div></div></div>').appendTo(inp);
    $('<div id="box' + i +'"><div class="form-group"><label class="col-sm-2 control-label">Answer</label><div class="col-md-5"><input type="text" id="a_text'+ i +'" class="form-control" name="a_text' + i +'" /></div><img src="<?php echo base_url(); ?>assets/add/remove.png" align="top" class="add" id="remove" /></div></div></div>').appendTo(inp);

    i++;
    s++;

    
  });
  
  
  
  $('body').on('click','#remove',function(){
    
    $(this).parent('div').remove();

    
  });

    
});




</script>

<script>

$(document).ready(function(){
  
  $('#tambah').click(function(){
    
    var inp = $('#box');
    
    
    var i = $('select').size() ;
    var s = $('input').size() ;
    
    //$('<div id="box' + i +'"><div class="form-group"><label class="col-sm-2 control-label">Answer</label><div class="col-md-5"><input type="text" id="a_text[' + i +']" class="form-control" name="a_text1[' + i +']" /></div><img src="<?php echo base_url(); ?>assets/add/remove.png" align="top" class="add" id="remove" /></div></div></div>').appendTo(inp);

    $('<div id="box' + i +'"><div class="form-group"><label class="col-sm-2 control-label">Module</label><div class="col-md-5"><select data-required="true"  id="moduleid"'+ i +'" name="moduleid"' + i + '" class="form-control">' + '<option value="">Select one </option>;<?php foreach($group as $row){ echo '<option value="'.$row->id.'">'.$row->name.'</option>'; } ?></select></div><img src="<?php echo base_url(); ?>assets/add/remove.png" align="top" class="add" id="remove" /></div></div></div>').appendTo(inp);

    i++;
    s++;

    
  });
  
  
  
  $('body').on('click','#remove',function(){
    
    $(this).parent('div').remove();

    
  });

    
});




</script>

<script>
// $(function(){
//        $("input").prop('required',true);
// });
// </script>
<script>
// $(function() {
//     var $Answer = Yes;
//     $("input[name='correct'][value="$Answer"]").attr('checked', true);
    
//     });
//  </script>



  <!--  <script type="text/javascript">
  window.onload = function() {
    document.getElementById('submitt').onclick = function() {
        document.getElementById('form-horizontal').submit();
        return false;
    };
};
</script>-->
<!--<script type="text/javascript">
alert("abc");
function myFunction() {
var q_id = document.getElementById("q_id").value;
var a_id = document.getElementById("a_id").value;
alert(q_id + "aaaaa");
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'q_id=' + q_id + 'a_id=' + a_id;
// AJAX code to submit form.
$.ajax({
type: "POST",
url: '<?php echo base_url("index.php/quizs/quiz_data"); ?>',
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}
</script>-->
<script type="text/javascript">
$(document).ready(function(){
var $modal = $('#load_popup_modal_show_id');
$('#click_to_load_modal_popup').on('click', function(){
$modal.load('questions/load-modal.php',{'id1': '1', 'id2': '2'},
function(){
$modal.modal('show');
});

});
});

</script>
<script type="text/javascript">
$( document ).ready(function() {
    console.log( "ready!" );
    //alert('<?php echo base_url(); ?>');
    console.log($("#type_id").val());
    var base_url;
    base_url = '<?php echo base_url(); ?>';

  $('#type_id').change(function() {
      console.log(base_url+'Course/ajax_trainingSubType');
        $.ajax({
            url: base_url+'/Course/ajax_trainingSubType',
            dataType: 'json',
            type: 'GET',
            // This is query string i.e. country_id=123
            data: {type_id : $('#type_id').val()},
            success: function(data) {
              console.log(data);
                $('#subtype_id').empty(); // clear the current elements in select box
                for (row in data) {
                    $('#subtype_id').append($('<option></option>').attr('value', data[row].subTypeID).text(data[row].subTypeName));
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});

</script>
</html>