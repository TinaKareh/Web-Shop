$(document).ready(function() {
  $('.nav-link-collapse').on('click', function() {
    $('.nav-link-collapse').not(this).removeClass('nav-link-show');
    $(this).toggleClass('nav-link-show');
  });
});

$(document).ready(function(){
  $("#my-input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#my-table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  filter_data(1);
   function filter_data(page){

     $('.filter_data').html("<div id='loading'></div>");
     var action = 'fetch_data';
     var minimum_price = $('#hidden_minimum_price').val();
     var maximum_price = $('#hidden_maximum_price').val();
     var category = get_filter('category');
     var size = get_filter('size');
     $.ajax({
       url:"/product/fetch_data"+page,
       method:"POST",
       datatype: "JSON",
       data: {action:action,minimum_price:minimum_price,maximum_price:maximum_price,category:category,size:size},
       success:function(data){
         $('.filter_data').html(data.item_list);
         $('#pagination_link').html(data.pagination_link);
       }
     });
   }

   function get_filter(class_name){
     var filter = [];
     $('.'+class_name+'.checked').each(function(){
          filter.push($(this).val());
     });
     return filter;
   }
});